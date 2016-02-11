<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
$cart_id = $_REQUEST['cart_id'];
$quantity_value = $_REQUEST['rent_quantity'];
$cart_id_array = array();
$quantity_value_array = array();
$process_status = "";
$extract_product_id_sql = "";
$product_id = array();
$limit_total = 0;



if($user_id != "" && $cart_id != "" && $quantity_value != ""){
  $date = date('Y-m-d');
  $date1 = str_replace('-', '/', $date);
  $ex_date = date('Y-m-d',strtotime($date1 . "+14 days"));

  $check_user_limit_sql = "select User_Rent_Limit from user where user_id = ".$user_id;
  $check_user_limit_exe = mysql_query($check_user_limit_sql);
  $check_user_limit_row = mysql_num_rows($check_user_limit_exe);
  do {
    $limit_total = $check_user_limit_row['User_Rent_Limit'];
  }while($check_user_limit_row = mysql_fetch_array($check_user_limit_exe));

  $cart_id_array = explode(",", $cart_id);
  $quantity_value_array = explode(",", $quantity_value);
  for($i=0;$i<sizeof($cart_id_array);$i++){
    $limit_total += $quantity_value_array[$i];
    $extract_product_id_sql = "select * from cart where cart_id = ".$cart_id_array[$i].";";
    $extract_product_id_exe = mysql_query($extract_product_id_sql);
    $extract_product_id_row = mysql_num_rows($extract_product_id_exe);
    do {
      $product_id[$i] = $extract_product_id_row['Product_ID'];
    }while($extract_product_id_row = mysql_fetch_array($extract_product_id_exe));
  }

  $update_rent_limit_sql = "UPDATE `user` SET `User_Rent_Limit`= ".$limit_total." WHERE User_ID = ".$user_id;
  $update_rent_limit_exe = mysql_query($update_rent_limit_sql);
  if (!$update_rent_limit_exe) {
      die('Invalid query: ' . mysql_error());
      echo   $update_rent_limit_sql;
  }


  for($k=0;$k<sizeof($cart_id_array);$k++){
    $product_sql = "select * from product where product_id = ".$product_id[$k]." ";
    echo $product_id[$k];
    $product_exe = mysql_query($product_sql);
    $product_row = mysql_num_rows($product_exe);
    do {
      $product_rent_price = $product_row['Product_Rent_Price'];
      $product_stock = $product_row['Product_Stock'];
    }while($product_row = mysql_fetch_array($product_exe));

    $update_product_stock=$product_stock-intval($quantity_value_array[$k]);
    $update_prduct_sql = "UPDATE `product` SET `Product_Stock`= ".$update_product_stock." WHERE Product_ID = ".$product_id[$k]."";
    $product_update_SQL_exe = mysql_query($update_prduct_sql);
    if (!$product_update_SQL_exe) {
        echo   $update_prduct_sql;
        die('Invalid query: ' . mysql_error());
    }
    else {
      $total_price_value = $product_rent_price*$quantity_value_array[$k];
      $final_submit_SQL = "INSERT INTO `rent`(`Rent_Type`, `Rent_Date`, `Rent_Exp_Date`, `Rent_Price`, `Rent_Quantity`, `User_ID`, `Product_ID`) VALUES ('1','".$date."','".$ex_date."',".$total_price_value.",".$quantity_value_array[$k].",".$user_id." ,".$product_id[$k].")";
      $final_submit_SQL_exe = mysql_query($final_submit_SQL);
      if (!$final_submit_SQL_exe) {
          die('Invalid query: ' . mysql_error());
          echo   $final_submit_SQL;
      }
      else {
        $remove_cart_item = "DELETE FROM `cart` WHERE user_id=".$user_id." and cart_id = ".$cart_id_array[$k];
        $remove_cart_item_exe = mysql_query($remove_cart_item);
        if (!$remove_cart_item_exe) {
            die('Invalid query: ' . mysql_error());
            echo   $remove_cart_item_exe;
        }
        else {
        }
      }
    }
  }

}
else {
  echo "FAIL";
}

?>
