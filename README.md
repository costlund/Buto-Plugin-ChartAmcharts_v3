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
