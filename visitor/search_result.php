<?php
    include("../dataconn/dataconn.php");

    if(isset($_REQUEST["search"]))
    {
		$search_text = $_REQUEST["search"];
		$loopstring ="";
		    $and_value = "or";
		    $empty_value = "";
		    $search_string = explode(" ", $search_text);
		    for($i=0;$i<sizeof($search_string);$i++) {
		      if($i!=(sizeof($search_string)-1)) {
		        $loopstring .= "product_name like '%".strval($search_string[$i])."%' ".$and_value." ";
		      }
		      else {
		        $loopstring .= "product_name like '%".strval($search_string[$i])."%' ".$empty_value." ";
		      }
		    }

		$sql = "SELECT * FROM product WHERE ".$loopstring;
		$search_result = mysql_query($sql);
		$total_result = mysql_num_rows($search_result);

		if(!$search_result) {
			echo "Query failed: " . mysql_error();
			exit;
		}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search_result</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/product.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- 	<script src="../js/jquery-2.2.0.js"></script> -->
	<script src="../js/main.js"></script>

</head>
<body>

	<div class="cont section group">

		<?php include("../utility/header.php");?>
		<!-- user_header -->
		<!--<div id="" class="logo_div section group">
			<div id="" class="col span_1_of_3">
				<a href="../user/index.php" id="" class="logo_link" id="">
					<img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/>
					<p id="" class="shop_name">Blu Video And Audio Shop</p>
				</a>
			</div>
			<div id="" class="search_div col span_1_of_3">
				<form action="search_result.php">
					<p><input type="text" name="search" id="" class="search_bar" placeholder="Search..." onkeydown="if(event.keyCode == 13) { this.form.submit(); console.log('search on submit'); return false; }"/></p>
				</form>
			</div>
			<div id="" class="col span_1_of_3 btn_group after_login">
				<a href="../user/add_to_cart.php" id="" class="user_btn cart_btn"/>
					<img src="../images/cartblack.png" title="add to cart" id="" class=""/>
				</a>
				<a href="../user/user_profile.php" id="" class="user_btn profile_btn"/>
					<img src="<?php echo $row["User_Profile_Pic"]; ?>" title="profile" id="" class=""/>
				</a>
			<div id="menu_function" class="user_btn menu_btn"/>
				<img src="../images/menu.png" title="menu" id="" class=""/>
				<div id="menu_content_function" class="menu_content">
					<a href="../user/change_password.php" id="" class="menu_item"><span>Change Password</span></a>
					<a href="" id="" class="menu_item"><span>Setting</span></a>
					<a href="<?php echo $logoutAction ;?>" id="" class="menu_item logout"><span>Log Out</span></a>
				</div>
			</div>
		</div>-->
		<!-- end of user_header -->

		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 slider_div">
		<!--<?php include("../utility/slider.php");?>-->
		</div>
		<div class="cont_element1 col span_2_of_2 pro_char">
			<div class="new_pro_color pro_title1">Search Result</div>
			<?php
				if($total_result == 0) {
					include("../utility/prod_not_found.php");
				}
				else {
					echo "<div id='' class='product_result'>Total results : " . $total_result."</div>";
					while($row = mysql_fetch_assoc($search_result)) {
						$product_id = $row['Product_ID'];
						$product_name = $row['Product_Name'];
						$product_image = $row['Product_Pic'];
						$product_price = $row['Product_Price'];
          

						echo "<div id='' class='pro_div1'>
								<div id='' class='prod_pic'>
									<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class=''><img src='".$product_image."' id='' class='prod_pic_img'/></a>
								</div>
								<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class='prod_name'>
								".$product_name."
								</a>
								<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class='prod_price'>
								RM ".$product_price."
								</a>

								<a href='../utility/".$login_product."?product_id=".$product_id."' name='buy_product' onclick='buy_assignLink()' class='prod_btn prod_buy'>BUY</a>
								<a href='../utility/".$login_product."?product_id=".$product_id."' name='rent_product' onclick='rent_assignLink()' class='prod_btn prod_rent'>RENT</a>
							</div>";
					}
				}
			?>
		</div>

		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
