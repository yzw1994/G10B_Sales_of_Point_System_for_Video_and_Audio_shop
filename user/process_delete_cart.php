<?php
	include("../dataconn/dataconn.php");
  if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];
	$cart_id = $_REQUEST['cart_id'];
	$cart_id_array = array();
	$process_status = "";
	if($user_id != "" && $cart_id != ""){
		$cart_id_array = explode(",", $cart_id);
		for($i=0;$i<sizeof($cart_id_array);$i++){
			$delete_cart_sql = "DELETE FROM `cart` WHERE Cart_ID =".$cart_id_array[$i]." and user_id =".$user_id;
			//echo $delete_cart_sql."<br>";
			$delete_cart_exe = mysql_query($delete_cart_sql);
			if (!$delete_cart_exe) {
	      die('Invalid query: ' . mysql_error());
	      $process_status = "FAIL";
	    }
	    else {
				$process_status = "SUCCESS";
	    }
		}
		echo $process_status;
	}
	else {
		echo "FAIL";
	}

?>
