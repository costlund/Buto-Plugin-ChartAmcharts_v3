function plugin_chart_amcharts_v3(){
  
  var self = this;
  var charts = [];
  
  /**
   * Transfer date param to javascript date object.
   */
  this.handleDataProvider = function(dataProvider){
    for(var i=0; i<dataProvider.length; i++){
      if(dataProvider[i].date){
        dataProvider[i].date = new Date(dataProvider[i].date.y, dataProvider[i].date.m-1, dataProvider[i].date.d);
      }
    }
    return dataProvider;
  }
  
  this.sync = function(charts){
    this.charts = charts;
    for (var x in this.charts) {
      this.charts[x].addListener("zoomed", this.syncZoom);
      this.charts[x].addListener('init', this.addCursorListeners);
    }
  }
  this.syncZoom = function (event) {
    for (x in this.charts) {
      if (this.charts[x].ignoreZoom) {
        this.charts[x].ignoreZoom = false;
      }
      if (event.chart != this.charts[x]) {
        this.charts[x].ignoreZoom = true;
        this.charts[x].zoomToDates(event.startDate, event.endDate);
      }
    }
  }
  this.addCursorListeners = function (event) {
    console.log(event);
    event.chart.chartCursor.addListener("changed", PluginChartAmcharts_v3.handleCursorChange);
    event.chart.chartCursor.addListener("onHideCursor", PluginChartAmcharts_v3.handleHideCursor);
  }
  this.handleCursorChange = function(event) {
    for (var x in this.charts) {
      if (event.chart != this.charts[x]) {
        this.charts[x].chartCursor.syncWithCursor(event.chart.chartCursor);
      }
    }
  }
  this.handleHideCursor = function() {
    for (var x in this.charts) {
      if (this.charts[x].chartCursor.hideCursor) {
        this.charts[x].chartCursor.forceShow = false;
        this.charts[x].chartCursor.hideCursor(false);
      }
    }
  }

}
var PluginChartAmcharts_v3 = new plugin_chart_amcharts_v3();




//var sync = new plugin_chart_amcharts_v3();


// https://www.amcharts.com/kbase/syncing-zoom-across-several-date-based-serial-charts/


var my_charts = [];
//charts.push(AmCharts.makeChart("chartdiv", chartConfig));
//charts.push(AmCharts.makeChart("chartdiv2", chartConfig2));
//charts.push(AmCharts.makeChart("chartdiv3", chartConfig3));


my_charts.push(chart_serial_example);
my_charts.push(chart_serial_example2);

//PluginChartAmcharts_v3.sync("chart_serial_example");
//PluginChartAmcharts_v3.sync("chart_serial_example2");



//for (var x in charts) {
//  charts[x].addListener("zoomed", syncZoom);
//  charts[x].addListener('init', addCursorListeners);
//}
PluginChartAmcharts_v3.sync(my_charts);


function addCursorListenerszzz(event) {
  event.chart.chartCursor.addListener("changed", handleCursorChange);
  event.chart.chartCursor.addListener("onHideCursor", handleHideCursor);
}
function syncZoomzzz(event) {
  for (x in charts) {
    if (charts[x].ignoreZoom) {
      charts[x].ignoreZoom = false;
    }
    if (event.chart != charts[x]) {
      charts[x].ignoreZoom = true;
      charts[x].zoomToDates(event.startDate, event.endDate);
    }
  }
}
function handleCursorChangezzz(event) {
  for (var x in charts) {
    if (event.chart != charts[x]) {
      charts[x].chartCursor.syncWithCursor(event.chart.chartCursor);
    }
  }
}
function handleHideCursorzzz() {
  for (var x in charts) {
    if (charts[x].chartCursor.hideCursor) {
      charts[x].chartCursor.forceShow = false;
      charts[x].chartCursor.hideCursor(false);
    }
  }
}

