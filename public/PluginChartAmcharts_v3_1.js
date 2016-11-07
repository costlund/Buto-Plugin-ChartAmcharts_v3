function plugin_chart_amcharts_v3(){
  /**
   * Transfer date param to javascript date object.
   */
  this.handleDataProvider = function(dataProvider){
    for(var i=0; i<dataProvider.length; i++){
      if(dataProvider[i].date){
        dataProvider[i].date = new Date(dataProvider[i].date.y, dataProvider[i].date.m-1, dataProvider[i].date.d);
      }
    }
    return dataProvider
  }
}
var PluginChartAmcharts_v3 = new plugin_chart_amcharts_v3();




// https://www.amcharts.com/kbase/syncing-zoom-across-several-date-based-serial-charts/


var charts = [];
//charts.push(AmCharts.makeChart("chartdiv", chartConfig));
//charts.push(AmCharts.makeChart("chartdiv2", chartConfig2));
//charts.push(AmCharts.makeChart("chartdiv3", chartConfig3));


charts.push(amchart_chart_serial_example);
charts.push(amchart_chart_serial_example2);

for (var x in charts) {
  charts[x].addListener("zoomed", syncZoom);
  charts[x].addListener("init", addCursorListeners);
}

function addCursorListeners(event) {
  event.chart.chartCursor.addListener("changed", handleCursorChange);
  event.chart.chartCursor.addListener("onHideCursor", handleHideCursor);
}

function syncZoom(event) {
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

function handleCursorChange(event) {
  for (var x in charts) {
    if (event.chart != charts[x]) {
      charts[x].chartCursor.syncWithCursor(event.chart.chartCursor);
    }
  }
}

function handleHideCursor() {
  for (var x in charts) {
    if (charts[x].chartCursor.hideCursor) {
      charts[x].chartCursor.forceShow = false;
      charts[x].chartCursor.hideCursor(false);
    }
  }
}