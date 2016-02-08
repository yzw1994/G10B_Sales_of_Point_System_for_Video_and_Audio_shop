<?php
	include("../dataconn/dataconn.php");
  if($_REQUEST['user_id'] && $_REQUEST['product_id']){
    $user_id=$_REQUEST['user_id'];
    $product_id=$_REQUEST['product_id'];
		$check_duplicate_cart_sql = "select * from cart where user_id =".$user_id." and product_id =".$product_id;
		$check_duplicate_cart_exe = mysql_query($check_duplicate_cart_sql);
		$check_duplicate_cart_row = mysql_num_rows($check_duplicate_cart_exe);

		if(!$check_duplicate_cart_row){
			$date = date('Y-m-d');
	    $add_to_cart_sql = "INSERT INTO `cart`(`Added_Date`, `Product_ID`, `User_ID`) VALUES ('$date', ".$product_id." , ".$user_id." )";
	    $add_to_cart_exe = mysql_query($add_to_cart_sql);
	    if (!$add_to_cart_exe) {
	      die('Invalid query: ' . mysql_error());
	      echo "FAIL";
	    }
	    else {
				echo "SUCCESS";
	    }
		}
		else {
			echo "EXIST";
		}

  }
  else {
    echo "FAIL";
  }

?>
