<?php include('db_link.php');
	$sql_query = "SELECT * FROM `mos_device` ";
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
	foreach ($data as $key => $item) {
		echo $item['location'];
		# code...
	}
	//mysql_free_result($result);
	mysql_close($conn);
?>