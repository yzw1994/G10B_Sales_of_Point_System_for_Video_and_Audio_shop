<?php
	include("dataconn.php");

	$product_id=(int)$_GET['pid'];	

	mysql_query("delete from product where Product_ID=$product_id");
	header("Location:admin_view_product.php");
	
?>

