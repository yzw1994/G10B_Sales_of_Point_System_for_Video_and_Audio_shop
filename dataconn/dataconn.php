<?php

	$host="localhost";
	$user="root";
	$password="";
	$database_name = "sales_of_point_system";
	$database_connection = mysql_connect($host,$user,$password);
	mysql_select_db($database_name, $database_connection);
	// Check connection
	if (!$database_connection){
    die("Database Connection Failed" . mysql_error());
	}
	else {
	}





?>
