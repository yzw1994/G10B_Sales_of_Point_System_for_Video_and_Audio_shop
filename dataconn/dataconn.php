<?php
	$host="localhost";
	$user="root";
	$password="";
	$database_name = "sales_of_point_system";
	$database_connection = mysql_connect($host,$user,$password);
	mysql_select_db($database_name, $database_connection);
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
