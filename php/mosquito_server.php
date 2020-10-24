<?php
date_default_timezone_set('Asia/Taipei');
$datetime= date("Y/m/d H:i:s");
$server='127.0.0.1';
$account='root';
$passwd='';
$db_name='mosquito';
$conn = mysqli_connect($server,$account,$passwd,$db_name) or die ('Eorror with MySQL connection');
mysqli_query($conn,"set names utf8");
//mysql_select_db($db_name);
if(isset($_GET['moscount'])||isset($_GET['fea_value'])||isset($_GET['in_time'])||isset($_GET['delay_time']))
{
//echo "pppp";
$moscount="[Mosquito count _".$_GET['moscount']."]";
$fea_value=$_GET['fea_value'];
$in_time=$_GET['in_time'];
$delay_time=$_GET['delay_time'];
$sql="INSERT INTO `mos` (moscount,fea_value,in_time,delay_time) VALUES ('$moscount','$fea_value',$in_time,'$delay_time');";
if(mysqli_query($conn,$sql))
{
echo '新增成功';
}
else{
echo "erro";
}
}
else{echo "Error";}
echo $datetime;
?>