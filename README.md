# Buto-Plugin-ChartAmcharts_v3

<p>Charts &amp; Maps.</p>

<a name="key_0"></a>

## Settings



<a name="key_1"></a>

## Usage



<a name="key_1_0"></a>

### Online examples

<pre><code>https://www.amcharts.com/demos-v3/
https://www.amcharts.com/demos-v3/column-with-rotated-series-v3/ (then use Open in links)</code></pre>

<a name="key_1_1"></a>

### Example

<ul>
<li>2 left axis.</li>
<li>1 right axis.</li>
</ul>
<pre><code>type: widget
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
          position: bottom-right</code></pre>

<a name="key_2"></a>

## Pages

<p>Check folder /page for yml data.</p>
<pre><code>http://localhost/?webmaster_plugin=chart/amcharts_v3&amp;page=demo_map</code></pre>

<a name="key_2_0"></a>

### page_demo_map



<a name="key_2_1"></a>

### page_demo_pie



<a name="key_2_2"></a>

### page_demo_serial



<a name="key_2_3"></a>

### page_demo_serial2



<a name="key_3"></a>

## Widgets



<a name="key_3_0"></a>

### widget_include

<pre><code>type: widget
data:
  plugin: chart/amcharts_v3
  method: include
  data:</code></pre>
<p>If purchasing a commercial license one could just point at the installation path via param commercial_license_path.</p>
<pre><code>    commercial_license_path: /_path_to_folder_</code></pre>
<p>Export buttons.</p>
<pre><code>    export: true</code></pre>

<a name="key_3_1"></a>

### widget_serial



<a name="key_3_2"></a>

### widget_stock



<a name="key_3_3"></a>

### widget_sync

<p>Use sync widget to make graphs to synchronize.</p>
<pre><code>type: widget
data:
  plugin: chart/amcharts_v3
  method: sync
  data:
    charts:
      - amcharts_obj_graph_1
      - amcharts_obj_graph_2</code></pre>

<a name="key_4"></a>

## Event



<a name="key_5"></a>

## Construct



<a name="key_6"></a>

## Methods



