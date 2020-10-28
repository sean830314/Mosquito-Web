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
@section('active')
@show
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
<div class="container">
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
<table class="table table-hover">
@section('body')
@show
</table> 
</div>
</body>
</html>