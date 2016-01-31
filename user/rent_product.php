<?php
	include("../dataconn/dataconn.php");
	$quantity_value_get = $_POST['quantity_value_hidden'];
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

	$result = mysql_query("SELECT * FROM user WHERE User_ID = '$user_id'");
	$row = mysql_fetch_assoc($result);

	if(isset($_POST['rent_product'])){
		$final_quantity = $_POST['product_quantity_value'];
	}
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
		<div class="purchase_div">
			<span id="" class="col span_5_of_5 rent_infotitle">
				Rent Confirmation
			</span>
			<div id="" class="col span_1_of_5">
				<img src="<?php echo $product_image;?>" class="purchase_product_picture">
			</div>
			<div id="" class="col span_4_of_5 purchase_product_title" style="">
				<?php echo $product_name;?>
			</div>
			<div id="" class="col span_4_of_5 purchase_quantity_function_div" style="">
				<div id="" class="product_content_quantity_function_title">Quantity</div>
				<form action="process_rent.php" method="POST">
				<div id="" class="product_content_quantity_function_operation">
					<script>
					price = '<?php echo $product_rent_price;?>';
					quantity_value = parseInt(document.getElementById('product_quantity_value').value);
					function minus_function(){
						quantity_value = parseInt(document.getElementById('product_quantity_value').value);
						if(quantity_value == 1){
							document.getElementById('product_quantity_value').value=quantity_value;
							document.getElementById('total_price').value=parseFloat(quantity_value*price);
						}
						else {
							quantity_value = quantity_value-1;
							document.getElementById('product_quantity_value').value=quantity_value;
							document.getElementById('total_price').value=parseFloat(quantity_value*price);
						}
					}
					function plus_function(){
						quantity_value = parseInt(document.getElementById('product_quantity_value').value);
						if(quantity_value == 5){
							document.getElementById('product_quantity_value').value=quantity_value;
							document.getElementById('total_price').value=parseFloat(quantity_value*price);
						}
						else {
							quantity_value = quantity_value+1;
							document.getElementById('product_quantity_value').value=quantity_value;
							document.getElementById('total_price').value=parseFloat(quantity_value*price);
						}
					}
					</script>
					<input type="button" name="quantity_minus" value="-" onclick="minus_function()" class="minus_function_char">
					<input type="number" id="product_quantity_value" name="product_quantity_value" value="<?php echo $quantity_value_get;?>" disabled="disabled" class="quantity_value_input"/>
					<input type="button" name="quantity_plus" value="+" onclick="plus_function()" class="plus_function_char">
				</div>
			</div>
			<div id="" class="col span_4_of_5 purchase_product_price" style="">
				RM <?php echo $product_rent_price;?>
			</div>
			<div id="" class="col span_4_of_5 purchase_product_price purchase_product_total_border">
				<span id="" class="currency_title">
					Total Price : RM
				</span>
				<input type="number" name="" id="total_price" class="purchase_product_amount" value="<?php echo $quantity_value_get*$product_rent_price;?>" disabled="disable"/>
			</div>
		</div>
		<div class="purchase_div user_info_div">
			<div id="" class="col span_2_of_4 purchase_user_info" style="margin-left:15px;">
				<?php echo $row["User_Name"]; ?><br/><br/>
				<?php echo $row["User_Address"]; ?><br/><br/>
				<?php echo $row["User_Phone"]; ?>
			</div>
			<div id="" class="col span_2_of_5 purchase_T_C" >
				Terms and condition<br>
				<hr>
				sjagbxkasxsb,cjdshdjba,sdbxsc,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjb,ksdhvxs,jjdbcmmsjdcbxjdsxgsv,cjshbxcj,hbjchssjagbxkasxsb,cjdshdjba,sdbxsc,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjbksdhvxs,jjdbcmmsjdcbxjdsxgsv,cjshbxcj,hbjchsjagbxkasxsb,cjdshdjba,sdbxsc,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjb,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjb,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjb,svdbcjsdbjcbxjcbs,dvcbsvdmbsdjb
				<br>
				<br>
				<input type="hidden" id="quantity_value_hidden_final" name="quantity_value_final" value="<?php echo $quantity_value_get;?>">
				<input type="hidden" id="user_id_hidden" name="product_id" value="<?php echo $product_id;?>">
				<input type="submit" value="Rent Now" id="" class="buy_now_btn" name="rent_product"/>

			</form>
			</div>

		</div>

		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
