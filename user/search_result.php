<?php
    include("../dataconn/dataconn.php");

    if(!isset($_SESSION))
    {
	    session_start();
    }
    $user_id = $_SESSION['user_id'];
    require("../dataconn/page_load.php");

    if(isset($_REQUEST["search"]))
    {
		$search_text = $_REQUEST["search"];
		$sql = "SELECT * FROM product WHERE Product_Name like '%$search_text%'";
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
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- 	<script src="../js/jquery-2.2.0.js"></script> -->
	<script src="../js/main.js"></script>

</head>
<body>

	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 slider_div">
		<!--<?php include("../utility/slider.php");?>-->
		</div>
		<div class="cont_element col span_2_of_2 pro_char">
			<div class="new_pro_color pro_title">Search Result</div>
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

						echo "<div id='' class='pro_div'>
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
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/leftprod.php");?>
		</div>
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/rightprod.php");?>
		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
