<?php
	include("../dataconn/dataconn.php");
	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];

	require("../dataconn/page_load.php");
	$product_id=(int)$_GET['pid'];
	mysql_query("DELETE from product WHERE Product_ID=$product_id");
	header("Location:admin_prodList.php");
?>
