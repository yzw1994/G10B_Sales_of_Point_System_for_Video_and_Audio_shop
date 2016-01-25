<div id="" class="new_pro_color pro_title">New Arrive
</div>
<?php
	$product_sql = "select * from product";
	$product_result = mysql_query($product_sql);

	$product_check = mysql_num_rows($product_result);
	$product_name = "";
	if($product_check!=0){
		$product_row = mysql_fetch_array($product_result);
		do{
			$product_name = $product_row['Product_Name'];
			$product_image = $product_row['Product_Pic'];
			$product_price = $product_row['Product_Price'];
			echo "
				<div id='' class='pro_div'>
					<div id='' class='prod_pic'>
						<img src='".$product_image."' id='' class='prod_pic_img'/>
					</div>
					<a href='' id='' class='prod_name'>
					".$product_name."
					</a>
					<a href='' id='' class='prod_price'>
					RM ".$product_price."
					</a>
					<a href='' class='prod_btn prod_rent'>RENT</a>
					<a href='' class='prod_btn prod_buy'>BUY</a>
				</div>
				";
		}while($product_row = mysql_fetch_array($product_result));
	}
	else {
		echo "222";
	}


		/**/

?>
