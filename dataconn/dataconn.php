<?php
	$host="localhost";
	$user="root";
	$password="";
	$database_name = "sales_of_point_system";
	$database_connection = mysql_connect($host,$user,$password);
	mysql_select_db($database_name, $database_connection);

	session_start();
?>
