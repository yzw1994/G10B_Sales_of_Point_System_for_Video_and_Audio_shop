<div id="" class="new_pro_color pro_title">New Arrive
</div>
<?php

	mysql_select_db($database_name, $database_connection);
	$product_result = mysql_query("select * from user where user_email = '$user_email' and user_password = '$user_password'");
	$search_exe = mysql_query($database_name,
	 $product_result);

		/*for($i=0;$i<10;$i++){
			echo "
				<div id='' class='pro_div'>
					<div id='' class='prod_pic'>
					</div>
					<a href='' id='' class='prod_name'>
					jkanaslkas
					</a>
					<a href='' class='prod_btn prod_rent'>RENT</a>
					<a href='' class='prod_btn prod_buy'>BUY</a>
				</div>
			";
		}*/

?>
