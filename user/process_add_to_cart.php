<?php
	include("../dataconn/dataconn.php");
  if($_REQUEST['user_id'] && $_REQUEST['product_id']){
    $user_id=$_REQUEST['user_id'];
    $product_id=$_REQUEST['product_id'];
    $date = date('Y-m-d');
    $add_to_cart_sql = "INSERT INTO `cart`(`Added_Date`, `Product_ID`, `User_ID`) VALUES ('$date', ".$product_id." , ".$user_id." )";
    $add_to_cart_exe = mysql_query($add_to_cart_sql);
    if (!$add_to_cart_exe) {
        die('Invalid query: ' . mysql_error());
        echo $add_to_cart_sql;
    }
    else {
    }
  }
  else {
    echo "cannot get";
  }

?>
