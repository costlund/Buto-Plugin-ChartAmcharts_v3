# Buto-Plugin-ChartAmcharts_v3

JavaScript Charts & Maps. Programming library for all your data visualization needs.

## Include

If purchasing a commercial license one could just point at the installation path via param commercial_license_path.

```
type: widget
data:
  plugin: chart/amcharts_v3
  method: include
  data:
    commercial_license_path: /_path_to_folder_
    export: true
```

## Example

https://www.amcharts.com/demos-v3/

### Pie chart

#### Javascript.

```
-
  type: div
  attribute:
    id: chartdiv_pie
    style: 'width:100%;height:400px'
  innerHTML:
-
  type: script
  innerHTML: |
    var chart = AmCharts.makeChart("chartdiv_pie", {
      "type": "pie",
      "theme": "light",
      "dataProvider": [{
        "country": "Lithuania",
        "litres": 501.9
      }, {
        "country": "Czech Republic",
        "litres": 301.9,
        "color": "#ff0000"
      }, {
        "country": "Ireland",
        "litres": 201.1
      }, {
        "country": "Germany",
        "litres": 165.8,
        "color": "#00ff00"
      }],
      "valueField": "litres",
      "titleField": "country",
      "colorField": "color",
      "balloon": {
        "fixedPosition": true
      }
    });                  
```

#### YML

```
-
  type: widget
  data:
    plugin: chart/amcharts_v3
    method: serial
    data:
      chart:
        id: my_pie_example
        style: 'width: 100%; height:400px;'
        data:
          type: pie
          theme: light
          dataProvider:
            - 
              country: Lithuania
              litres: 501.9
            - 
              country: Czech Republic
              litres: 301.9
              color: "#ff0000"
            - 
              country: Ireland
              litres: 201.1
            - 
              country: Germany
              litres: 165.8
              color: "#00ff00"
          valueField: litres
          titleField: country
          colorField: color
          balloon:
            fixedPosition: true
          export:
            enabled: true
            fileName: graph_export
```

## Demo page

Check link to view demo page.

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
