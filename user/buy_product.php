<?php
	include("../dataconn/dataconn.php");


	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];
	require("../dataconn/page_load.php");
	$product_id = $_REQUEST['product_id'];
  $product_sql = "select * from product where product_id = ".$product_id." ";
  $product_exe = mysql_query($product_sql);
  $product_row = mysql_num_rows($product_exe);
  $product_image = "";
  do {
    $product_image = $product_row['Product_Pic'];
    $product_name = $product_row['Product_Name'];
    $product_price = $product_row['Product_Price'];
    $product_rent_price = $product_row['Product_Rent_Price'];
    $product_describe = $product_row['Product_Description'];
  }while($product_row = mysql_fetch_array($product_exe));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	<link href="../css/product.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/jquery-2.2.0.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2">
			<div id="" class="purchase_div">
				<span id="" class="purchase_title">Confirmation for Purchasing</span>
				<div id="" class="purchase_product_div">
					<div id="" class="span_5_of_1 purchase_product_img" >
						<img src="<?php echo $product_image;?>" class="purchase_product_picture">
					</div>
						<div id="" class="purchase_product_title">
							<?php echo $product_name;?>
						</div>
						<div id="" class="purchase_description_char">
							<span id="" class="purchase_product_caption">PRICE : </span>
							<span id="" class="purchase_product_value purchase_product_price">RM <?php echo $product_price;?></span>
						</div>
						<div id="" class="purchase_description_char purchase_product_amount">
							<span id="" class="purchase_product_caption">AMOUNT : </span>
							<span id="" class="purchase_product_value"><?php echo $product_price;?></span>
						</div>
				</div>
			</div>
		</div>

		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
