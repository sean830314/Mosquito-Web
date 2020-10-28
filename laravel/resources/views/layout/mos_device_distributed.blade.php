<!DOCTYPE html>
<html lang="zh-tw">
<head>
<meta charset="UTF-8" http-equiv="refresh" content="5">
<title>@yield('title')</title>
<!-- jQuery css and js -->
<link rel="stylesheet" href="http://code.jquery.com/mo…/1.4.3/jquery.mobile-1.4.3.min.css" /> 
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--include the highcharts library-->
<script src="http://code.highcharts.com/highcharts.js"></script>
<!-- Bootstrap css and js -->
<link rel= "stylesheet" href= "http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" >
<link rel= "stylesheet" href= "http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme. min.css" >
<script src= "http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>
</head>
      <body>
<!-- 導航欄 -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
<!-- 居中效果 -->
<div class="container">
<!-- 導航欄header -->
<div class="navbar-header">
<!-- 做切換按鈕-->
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<!-- bootstrap題目 -->
<a class="navbar-brand" href="#">管理系統</a>
</div>
<!-- 區塊元素<ul>，將內容顯示為項目清單，每一項用<li>標記-->
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="mos_web">設備頁面</a></li>
<li><a href="mos_data">資料頁面</a></li>
<li class="active"><a href="#">設備分佈圖</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sort <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="Mos_web.php?sort=device_number">device_number</a></li>
<li><a href="Mos_web.php?sort=device_model">device_model</a></li>
<li><a href="Mos_web.php?sort=electricity">electricity</a></li>
<li><a href="Mos_web.php?sort=status">status</a></li>
<li><a href="Mos_web.php?sort=maintenance_records">maintenance_records</a></li>
<li><a href="Mos_web.php?sort=Maintenance_time">Maintenance_time</a></li>
<li><a href="Mos_web.php?sort=keeper">keeper</a></li>
<li><a href="Mos_web.php?sort=All">All</a></li>
</ul>
</li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>

    <div id="map"></div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<key>&callback=initMap"
    type="text/javascript"></script>
    <script>
    var map;
    function initMap() {
    var myLatLng = {lat: 22.994347, lng: 120.218050};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      mapTypeId: 'roadmap',
      center: myLatLng,
       styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
      });
    @foreach($data as $key => $item)
    var myLatLng = {lat: {{$item['x_location']}}, lng: {{$item['y_location']}} };
    var x_location={{$item['x_location']}};
    var y_location={{$item['y_location']}};
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: ""+x_location+","+y_location+""
        });
    marker.addListener('dblclick', function() {
      window.open('mos_gmap/'+{{$item['x_location']}}+","+{{$item['y_location']}},
      {{$item['x_location']}}+","+{{$item['y_location']}}, config='height=600,width=1000');
    });
    @endforeach
    }
    </script>
  </body>
</html>