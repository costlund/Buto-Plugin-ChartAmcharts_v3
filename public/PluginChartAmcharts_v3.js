// https://www.amcharts.com/kbase/syncing-zoom-across-several-date-based-serial-charts/
function plugin_chart_amcharts_v3(){
  var self = this;
  var charts = [];
  this.sync = function(charts){
    this.charts = charts;
    for (var x in this.charts) {
      this.charts[x].addListener("zoomed", this.syncZoom);
      this.charts[x].addListener('init', this.addCursorListeners);
    }
  }
  this.syncZoom = function (event) {
    for (x in self.charts) {
      if (self.charts[x].ignoreZoom) {
        self.charts[x].ignoreZoom = false;
      }
      if (event.chart != self.charts[x]) {
        self.charts[x].ignoreZoom = true;
        self.charts[x].zoomToDates(event.startDate, event.endDate);
      }
    }
  }
  this.addCursorListeners = function (event) {
    event.chart.chartCursor.addListener("changed", PluginChartAmcharts_v3.handleCursorChange);
    event.chart.chartCursor.addListener("onHideCursor", PluginChartAmcharts_v3.handleHideCursor);
  }
  this.handleCursorChange = function(event) {
    for (var x in self.charts) {
      if (event.chart != self.charts[x]) {
        self.charts[x].chartCursor.syncWithCursor(event.chart.chartCursor);
      }
    }
  }
  this.handleHideCursor = function() {
    for (var x in self.charts) {
      if (self.charts[x].chartCursor.hideCursor) {
        self.charts[x].chartCursor.forceShow = false;
        self.charts[x].chartCursor.hideCursor(false);
      }
    }
  }
}
var PluginChartAmcharts_v3 = new plugin_chart_amcharts_v3();




//var my_charts = [];
//my_charts.push(chart_serial_example);
//my_charts.push(chart_serial_example2);
//PluginChartAmcharts_v3.sync(my_charts);



