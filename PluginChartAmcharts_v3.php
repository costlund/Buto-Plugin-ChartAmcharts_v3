<?php
/**
<p>
Amcharts..
</p>
<p>
Visit <a href="http://www.amcharts.com/" target="_blank">www.amcharts.com</a> for more info.
</p>
 */
class PluginChartAmcharts_v3{
  /**
  <p>
  Including Javascript in html/head section (required). Also PluginChartAmcharts_v3 is included if using sync widget.
  </p>
  */
  public static function widget_include(){
    $element = array();
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/amcharts.js', 'type' => 'text/javascript'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/serial.js', 'type' => 'text/javascript'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/amstock.js', 'type' => 'text/javascript'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/PluginChartAmcharts_v3.js', 'type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
  /**
  <p>
  Stock chart with example data. Remve the chartDate param to retrieve generated data.
  </p>
   */
  public function widget_stock($data){
    wfPlugin::includeonce('wf/array');
    if(isset($data['data'])){
      $data = new PluginWfArray($data['data']);
    }else{
      /**
       * If there is no data we pic up example data.
       */
      $data = new PluginWfArray();
      $widget = wfSettings::getSettingsAsObject('/plugin/chart/amcharts_v3/default/widget.stock_example.yml');
      $data->set(null, $widget->get());
    }
    $element = array();
    $element[] = wfDocument::createHtmlElement('div', '', array('id' => $data->get('id'), 'style' => $data->get('style')));
    if($data->get('chartData')){
      $json = json_encode($data->get('chartData'));
      $element[] = wfDocument::createHtmlElement('script', "var chartData = $json;", array('type' => 'text/javascript'));
    }else{
      /**
       * If no chartData param we render test data.
       */
      $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/widget.stock_example_data.js', 'type' => 'text/javascript'));
    }
    $json = json_encode($data->get('data'));
    $json = str_replace('"chartData"', 'chartData', $json);
    $element[] = wfDocument::createHtmlElement('script', 'var amchart_'.$data->get('id').' = AmCharts.makeChart("'.$data->get('id').'", '.$json.');', array('type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
  /**
  <p>
  Serial chart with exampel data.
  Chart data cound be put in $data or retrieved via sql query.
  </p>
   */
  public function widget_serial($data){
    wfPlugin::includeonce('wf/array');
    if(isset($data['data'])){
      $data = new PluginWfArray($data['data']);
    }else{
      /**
       * If there is no data we pic up example data.
       */
      $data = new PluginWfArray();
      $widget = wfSettings::getSettingsAsObject('/plugin/chart/amcharts_v3/default/widget.serial_example.yml');
      $data->set(null, $widget->get());
    }
    /**
     * Get data from MySql.
     */
    if($data->get('mysql_conn') && $data->get('mysql_query')){
      if($data->get('mysql_method_before')){
        /**
         * Run method before for some modification about MySql.
         */
        wfPlugin::includeonce($data->get('mysql_method_before/plugin'));
        $obj = wfSettings::getPluginObj($data->get('mysql_method_before/plugin'));
        $method = $data->get('mysql_method_before/method');
        $data->set(null, $obj->$method($data->get()));
      }
      wfPlugin::includeonce('wf/mysql');
      $mysql =new PluginWfMysql();
      $mysql->open($data->get('mysql_conn'));
      $dataProvider = $mysql->runSql($data->get('mysql_query'), null);
      $data->set('chart/data/dataProvider', $dataProvider['data']);
    }
    /**
     * Method before elements.
     */
    if($data->get('method_before')){
      /**
       * Run method before for some modification about MySql.
       */
      wfPlugin::includeonce($data->get('method_before/plugin'));
      $obj = wfSettings::getPluginObj($data->get('method_before/plugin'));
      $method = $data->get('method_before/method');
      $data->set(null, $obj->$method($data->get()));
    }
    /**
     * Create elements.
     */
    $element = array();
    $element[] = wfDocument::createHtmlElement('div', '', array('id' => $data->get('chart/id'), 'style' => $data->get('chart/style')));
    $json = json_encode($data->get('chart/data'));
    $element[] = wfDocument::createHtmlElement('script', 'var '.$data->get('chart/id').' = AmCharts.makeChart("'.$data->get('chart/id').'", '.$json.');', array('type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
  /**
   * Sync graphs.
   */
  public function widget_sync($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $element = array();
    $code = "var my_charts = [];";
    if($data->get('data/charts')){
      foreach ($data->get('data/charts') as $key => $value) {
        $code .= "my_charts.push($value);";
      }
    }
    $code .= "PluginChartAmcharts_v3.sync(my_charts);";
    $element[] = wfDocument::createHtmlElement('script', $code);
    wfDocument::renderElement($element);
  }

  
  
}