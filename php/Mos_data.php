<?php include('db_link.php');
//$sql_query ="Select * from mos_device a Where `in_database_time` = (Select Max(b.`in_database_time`) from mos_device b Where a.device_number = b.device_number)";
if(isset($_GET['data'])){
$sql_query = "select * from mos_data where device_number='".$_GET['data']."'";
}
else{$sql_query = "select * from mos_data";}
	$result = mysql_query($sql_query);
	$key=0;
	while($row = mysql_fetch_array($result))
	{
		$data[$key]['device_number']=$row['device_number'];
		$data[$key]['count']=$row['count'];
		$data[$key]['fea_value']=$row['fea_value'];
		$data[$key]['species']=$row['species'];
		$data[$key]['in_time']=$row['in_time'];
		$data[$key]['delay_time']=$row['delay_time'];
		$data[$key]['in_database_time']=$row['in_database_time'];
		$key++;
	}
	mysql_close($conn);
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="5">
	<title>資料頁面</title>
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
				<a class="navbar-brand" href="#">管理系統</a>
			</div>
			<!-- 區塊元素<ul>，將內容顯示為項目清單，每一項用<li>標記-->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="Mos_web.php">設備頁面</a></li>
					<li class="active"><a href="#">資料頁面</a></li>
					<li><a href="Mos_device_distributed.php">設備分佈圖</a></li>
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
			 	<tr><td>編號</td><td>筆數</td><td>特徵值</td><td>蚊子種類</td><td>in time</td><td>delay time</td><td>in_database_time</td><td>編輯</td><td>刪除</td>
				</tr>
			 	<?php foreach($data as $key => $item): ?>
			 	<tr><td><?=$item['device_number']?></td><td><?=$item['count']?></td><td><?=$item['fea_value']?></td><td><?=$item['species']?></td><td><?=$item['in_time']?></td>
			 	<td><?=$item['delay_time']?></td><td><?=$item['in_database_time']?></td><td><a href="" role="btn" class="btn btn-danger">編輯</a></td><td><a href="" role="btn" class="btn btn-danger">刪除</a></td></tr>
			 	<?php endforeach; ?>
		</table>	
	</div>
</body>
</html>