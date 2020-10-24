<?php include('db_link.php');
//$sql_query ="Select * from mos_device a Where `in_database_time` = (Select Max(b.`in_database_time`) from mos_device b Where a.device_number = b.device_number)";
$sql_query = "SELECT * FROM `mos_device` order by `in_database_time` desc";
	$result = mysql_query($sql_query);
	$key=0;
	while($row = mysql_fetch_array($result))
	{
		$data[$key]['device_number']=$row['device_number'];
		$data[$key]['device_model']=$row['device_model'];
		$data[$key]['electricity']=$row['electricity'];
		$data[$key]['status']=$row['status'];
		$data[$key]['maintenance_records']=$row['maintenance_records'];
		$data[$key]['Maintenance_time']=$row['Maintenance_time'];
		$data[$key]['location']=$row['location'];
		$data[$key]['keeper']=$row['keeper'];
		$key++;
	}
	//mysql_free_result($result);
	mysql_close($conn);
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="5">
	<title>Highcharts</title>
		<!-- jQuery css and js -->
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css" />		
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		
		<!--include the highcharts library-->
		<script src="http://code.highcharts.com/highcharts.js"></script>

		<!-- Bootstrap css and js -->
		<link  rel= "stylesheet"  href= "http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" >
		<link  rel= "stylesheet"  href= "http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme. min.css" >
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
				<a class="navbar-brand" href="#">Bootstrap theme</a>
			</div>
			<!-- 區塊元素<ul>，將內容顯示為項目清單，每一項用<li>標記-->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Setting</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<div class="container">
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
		 <table class="table table-hover">
			 	<tr><td>編號</td><td>型號</td><td>電量</td><td>狀態</td><td>維修記錄</td><td>維修時間</td><td>位置</td><td>負責人</td><td>測試</td><td>資料</td>
				</tr>
			 	<?php foreach($data as $key => $item): ?>
			 	<tr><td><?=$item['device_number']?></td><td><?=$item['device_model']?></td><td><?=$item['electricity']?></td><td><?=$item['status']?></td><td><?=$item['maintenance_records']?></td>
			 	<td><?=$item['Maintenance_time']?></td><td><?=$item['location']?></td><td><?=$item['keeper']?></td><td><a href="" role="btn" class="btn btn-danger">測試</a></td><td><a href="" role="btn" class="btn btn-danger">資料</a></td></tr>
			 	<?php endforeach; ?>
		</table>	
	</div>
</body>
</html>