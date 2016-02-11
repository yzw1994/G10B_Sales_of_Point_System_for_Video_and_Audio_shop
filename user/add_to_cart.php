<?php
	include("../dataconn/dataconn.php");


	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];




?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/cart.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/jquery-2.2.0.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/add_to_cart.js"></script>
	<script>

	</script>
</head>
<body>

	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2">
		<!--<div id="" class="rent_and_buy_control_div">
			<input type="button" name="" id="" class="buy_control_div_btn" value="BUY"/>
			<input type="button" name="" id="" class="rent_control_div_btn" value="RENT"/>
		</div>-->
		<form name="cart_form" action="" method="POST">
		<?php
			$display_cart_sql = "SELECT * FROM cart inner join product WHERE cart.product_id = product.product_id and cart.user_id =".$user_id." ORDER BY product.product_name ASC";
			$total_price = 0;
			$display_cart_exe = mysql_query($display_cart_sql);
			$display_cart_row = mysql_num_rows($display_cart_exe);
			if($display_cart_row){
				while($display_cart_row = mysql_fetch_array($display_cart_exe)){
					$product_id = $display_cart_row['Product_ID'];
					$product_name = $display_cart_row['Product_Name'];
					$product_image = $display_cart_row['Product_Pic'];
					$product_describe = $display_cart_row['Product_Description'];
					$product_price = $display_cart_row['Product_Price'];
					$product_rent_price = $display_cart_row['Product_Rent_Price'];
					$cart_id = $display_cart_row['Cart_ID'];

					echo "
					<div id='cart_control_outer' class='cart_prod_div span_5_of_5'>
		          <a href='../utility/product_page_login.php?product_id=".$product_id."' target='_blank' id='' class='cart_prod_link'>
		            <div id='' class='span_1_of_5 right_border cart_prod_image'>
		                <img src='".$product_image."' id='' class=''/>
		            </div>
		          </a>
		          <div id='cart_control_inner' class='span_4_of_5'>
		              <span id='' class='cart_prod_title'>
		                <a href='../utility/product_page_login.php?product_id=".$product_id."' target='_blank' id='' class='cart_prod_link'>
										".$product_name."
										</a>
		              </span>
									<span id='' class='cart_prod_checkbox'>
										<input type='checkbox' id='checkbox_value' class='' name='checkbox_value' value='".$cart_id."'/>
		            	</span>
		            	<span id='' class='cart_prod_description right_border_dotted'>
		            		".$product_describe."
		            	</span>
		            	<span id='' class='cart_prod_price right_border_dotted'>
		            		Buy: RM<input type='number' id='product_price_input' name='product_price_input' value='".$product_price."' disabled='disabled'/>/&nbsp;
										Rent: RM<input type='number' id='product_price_input' name='product_price_input' value='".$product_rent_price."' disabled='disabled'/>
		            	</span>
		            	<span id='' class='cart_prod_amount'>
		              	Amount :
										<input type='button' name='quantity_minus' value='-' onclick='minus_function()' class='minus_function_char'>
										<input type='number' id='product_quantity_value' name='product_quantity_value' value='1' disabled='disabled' class='quantity_value_input'/>
										<input type='button' name='quantity_plus' value='+' onclick='plus_function()' class='plus_function_char'>
		            	</span>
		          </div>
		      </div>
					";
					$total_price+=$product_price;
				};
			}
			else {
				echo "
				<div id='' class='empty_cart_div span_5_of_5'>
					Your cart is empty!
				</div>
				";
			}
		?>
		<script>
		 var user_id = <?php echo $user_id;?>;
		 var product_id = <?php echo $product_id;?>;
		 var cart_id = <?php echo $cart_id;?>;
		</script>

      <div id="" class="cart_control_div">

        <span id="" class="cart_select_all right_border_white">
          <input type="checkbox" name="selectall" id="check_all_checkbox" onClick="" class="cart_delete_all"/>
          SELECT ALL
        </span>
        <span id="delete_cart" class="cart_delete_all right_border_white" name="deleteall">
          DELETE
        </span>


        <span id="" class="cart_item_amount right_border_white">
          CHOOSED ITEM :
          <span id="choosen_value" class="cart_count_result">

          </span>
        </span>

        <span id="" class="cart_count_total">
          TOTAL :
          <span id="" class="cart_count_result">
          <?php echo $total_price;?>
          </span>
        </span>
				<button id="" class="cart_purchase_btn">
          BUY
        </button>
        <button id="" class="cart_purchase_btn">
          RENT
        </button>
      </div>
		</div>
		</form>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
