<html>
  <head>
    <meta charset="utf-8">
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
      #container {
        min-width: 310px;
        max-width: 800px;
        height: 400px;
        margin: 0 auto
      }
    </style>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.highcharts.com/stock/highstock.js"></script>
        <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div id="container" style="width:100%; height:400px;"></div>
        <div id="con"></div>
        <script language="javascript">
        var fea_value=[];
        var count=[];
        @foreach($mosdata as $key )
        var item_count={{$key->count}};
        var item_fea_value={{$key->fea_value}};
        count.push(item_count);
        fea_value.push(item_fea_value);
        @endforeach
        Highcharts.chart('container', {

    title: {
        text: 'Mosquito'
    },

    subtitle: {
        text: 'Source: 127.0.0.1/mos_web'
    },
    xAxis: {
      title: {
      text: 'fea_value'
      },
      categories: fea_value,
    },
    yAxis: {
        title: {
            text: 'count of data'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    series: [{
        name: 'line1',
        data: count
    }]

});

       
    </script>
  </body>
</html>