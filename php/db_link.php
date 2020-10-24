<?php
	$server='127.0.0.1';
	$account='root';
	$passwd='';
	$db_name='mosquito';
	$conn=mysql_connect($server,$account,$passwd) or die ('Eorror');
	mysql_query("set names utf8");
	mysql_select_db($db_name);
?>
