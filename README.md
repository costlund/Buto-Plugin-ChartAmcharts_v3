# Buto-Plugin-ChartAmcharts_v3
Charts & Maps.

## Include
```
type: widget
data:
  plugin: chart/amcharts_v3
  method: include
  data:
```
### License 
If purchasing a commercial license one could just point at the installation path via param commercial_license_path.
```
    commercial_license_path: /_path_to_folder_
```
### Export buttons
```
    export: true
```

## Online examples
```
https://www.amcharts.com/demos-v3/
https://www.amcharts.com/demos-v3/column-with-rotated-series-v3/ (then use Open in links)
```

## Demos
Check folder /page for yml data.
### Serial
http://localhost/?webmaster_plugin=chart/amcharts_v3&page=demo_serial
### Pie
http://localhost/?webmaster_plugin=chart/amcharts_v3&page=demo_pie
### Map
http://localhost/?webmaster_plugin=chart/amcharts_v3&page=demo_map

## Sync
Use sync widget to make graphs to synchronize.
```
type: widget
data:
  plugin: chart/amcharts_v3
  method: sync
  data:
    charts:
      - amcharts_obj_graph_1
      - amcharts_obj_graph_2
```

# Examples
## Serial chart with multiple axis
- 2 left axis.
- 1 right axis.

```
type: widget
data:
  plugin: chart/amcharts_v3
  method: serial
  data:
    chart:
      id: chart_task_minutes_time
      style: 'width: 100%; height:400px;'
      data:
        type: serial
        theme: none
        legend:
          useGraphSettings: true
        dataProvider:
          -
            date: '2001-01-01'
            visits: 444
            hits: 33
            views: 22
          -
            date: '2001-07-01'
            visits: 333
            hits: 44
            views: 55
        synchronizeGrid: true
        valueAxes:
          -
            id: v1
            axisColor: "#FF6600"
            axisThickness: 2
            axisAlpha: 1
            position: left
          -
            id: v2
            axisColor: "#FCD202"
            axisThickness: 2
            axisAlpha: 1
            position: right
          -
            id: v3
            axisColor: "#B0DE09"
            axisThickness: 2
            gridAlpha: 0
            offset: 50
            axisAlpha: 1
            position: left
        graphs:
          -
            valueAxis: v1
            lineColor: "#FF6600"
            bullet: round
            bulletBorderThickness: 1
            hideBulletsCount: 30
            title: red line
            valueField: visits
            fillAlphas: 0
          -
            valueAxis: v2
            lineColor: "#FCD202"
            bullet: square
            bulletBorderThickness: 1
            hideBulletsCount: 30
            title: yellow line
            valueField: hits
            fillAlphas: 0
          -
            valueAxis: v3
            lineColor: "#B0DE09"
            bullet: triangleUp
            bulletBorderThickness: 1
            hideBulletsCount: 30
            title: green line
            valueField: views
            fillAlphas: 0
        chartScrollbar: {}
        chartCursor:
          cursorPosition: mouse
        categoryField: date
        categoryAxis:
          parseDates: true
          axisColor: "#DADADA"
          minorGridEnabled: true
        export:
          enabled: true
          position: bottom-right
```
