<?php
	include("dataconn.php");

	$product_id=(int)$_GET['pid'];	

	mysql_query("delete from product where product_id=$product_id");
	header("Location:admin_view_product.php");
	
?>

