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
$product_id = array();
$success_val = "";

if($user_id != "" && $cart_id != "" && $quantity_value != ""){
  $date = date('Y-m-d');
  $cart_id_array = explode(",", $cart_id);
  $quantity_value_array = explode(",", $quantity_value);
  for($i=0;$i<sizeof($cart_id_array);$i++){
    $extract_product_id_sql = "select * from cart where cart_id = ".$cart_id_array[$i].";";
    $extract_product_id_exe = mysql_query($extract_product_id_sql);
    $extract_product_id_row = mysql_num_rows($extract_product_id_exe);
    do {
      $product_id[$i] = $extract_product_id_row['Product_ID'];
    }while($extract_product_id_row = mysql_fetch_array($extract_product_id_exe));

    $product_sql = "select * from product where product_id = ".$product_id[$i]." ";
    $product_exe = mysql_query($product_sql);
    $product_row = mysql_num_rows($product_exe);
    $product_image = "";
    do {
      $product_price = $product_row['Product_Price'];
      $product_stock = $product_row['Product_Stock'];
    }while($product_row = mysql_fetch_array($product_exe));

    $update_product_stock=$product_stock-intval($quantity_value_array[$i]);
    $update_prduct_sql = "UPDATE `product` SET `Product_Stock`= ".$update_product_stock." WHERE Product_ID = ".$product_id[$i]."";
    $product_update_SQL_exe = mysql_query($update_prduct_sql);
    if (!$product_update_SQL_exe) {
        echo   $update_prduct_sql;
        die('Invalid query: ' . mysql_error());
    }
    else {
      $total_price_value = $product_price*$quantity_value_array[$i];
      $final_submit_SQL = "INSERT INTO `sold`(`Sold_Type`, `Sold_Date`, `Sold_Price`, `Quantity`, `User_ID`, `Prodcut_ID`) VALUES ('1','".$date."',".$total_price_value.",".$quantity_value_array[$i].", ".$user_id." ,".$product_id[$i].")";
      $final_submit_SQL_exe = mysql_query($final_submit_SQL);
      if (!$final_submit_SQL_exe) {
          die('Invalid query: ' . mysql_error());
          echo   $final_submit_SQL;
      }
      else {
        $remove_cart_item = "DELETE FROM `cart` WHERE user_id=".$user_id." and cart_id = ".$cart_id_array[$i];
        $remove_cart_item_exe = mysql_query($remove_cart_item);
        if (!$remove_cart_item_exe) {
            die('Invalid query: ' . mysql_error());
            echo   $remove_cart_item_exe;
        }
        $success_val = "SUCCESS";
      }
    }
  }
  echo $success_val;
}
else {
  echo "FAIL";
}
?>
