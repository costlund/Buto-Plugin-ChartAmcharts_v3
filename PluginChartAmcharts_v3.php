<?php
/**
<p>
Amcharts.
</p>
<p>
Visit <a href="http://www.amcharts.com/" target="_blank">www.amcharts.com</a> for more info.
</p>
 */
class PluginChartAmcharts_v3{
  /**
  <p>
  Including Javascript in html/head section (required).
  </p>
  */
  public static function widget_include(){
    $element = array();
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/amcharts.js', 'type' => 'text/javascript'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/serial.js', 'type' => 'text/javascript'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/amcharts/amstock.js', 'type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }

  /**
  <p>
  Stock example.
  </p>
   */
  public function widget_stock_example($data){
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
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/PluginChartAmcharts_v3.js', 'type' => 'text/javascript'));
    if($data->get('chartData')){
      $json = json_encode($data->get('chartData'));
      //$element[] = wfDocument::createHtmlElement('script', "var chartData = PluginChartAmcharts_v3.handleDataProvider($json);", array('type' => 'text/javascript'));
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
  Serial example.
  </p>
   */
  public function widget_serial_example($data){
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
    $element = array();
    $element[] = wfDocument::createHtmlElement('div', '', array('id' => $data->get('id'), 'style' => $data->get('style')));
    $json = json_encode($data->get('data'));
    $element[] = wfDocument::createHtmlElement('script', 'var '.$data->get('id').' = AmCharts.makeChart("'.$data->get('id').'", '.$json.');', array('type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
  public function widget_sync($data){
    $element = array();
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/chart/amcharts_v3/PluginChartAmcharts_v3.js', 'type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }

  
  
}