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
										<input type='checkbox' id='delete_checkbox_value' class='' name='delete_checkbox_value' value='".$cart_id."'/>
		            	</span>
		            	<span id='' class='cart_prod_description right_border_dotted'>
		            		".$product_describe."
		            	</span>
		            	<span id='' class='cart_prod_price right_border_dotted'>
		            		RM ".$product_price."
		            	</span>
		            	<span id='' class='cart_prod_price right_border_dotted'>
		              	Amount :
										<span id='' class='cart_count_result'>
				            	1
				          	</span>
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
          PURCHASE
        </button>
      </div>
		</div>
		</form>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
