<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
if(isset($_POST['rent_product'])){
  $date = date('Y-m-d');
  $date1 = str_replace('-', '/', $date);
  $ex_date = date('Y-m-d',strtotime($date1 . "+14 days"));

  $product_id = $_REQUEST['product_id'];
  $product_sql = "select * from product where product_id = ".$product_id." ";
  $product_exe = mysql_query($product_sql);
  $product_row = mysql_num_rows($product_exe);
  $product_image = "";
  do {
    $product_rent_price = $product_row['Product_Rent_Price'];
    $product_stock = $product_row['Product_Stock'];
  }while($product_row = mysql_fetch_array($product_exe));
  $quantity_value_final = $_POST['quantity_value_final'];

  $check_user_limit_sql = "select User_Rent_Limit from user where user_id = ".$user_id;
  $check_user_limit_exe = mysql_query($check_user_limit_sql);
  $check_user_limit_row = mysql_num_rows($check_user_limit_exe);
  do {
    $check_user_limit_result = $check_user_limit_row['User_Rent_Limit'];
  }while($check_user_limit_row = mysql_fetch_array($check_user_limit_exe));

  $check_user_limit_result = $check_user_limit_result+$quantity_value_final;

  $update_rent_limit_sql = "UPDATE `user` SET `User_Rent_Limit`= ".$check_user_limit_result." WHERE User_ID = ".$user_id;
  $update_rent_limit_exe = mysql_query($update_rent_limit_sql);
  if (!$update_rent_limit_exe) {
      die('Invalid query: ' . mysql_error());
      echo   $update_rent_limit_sql;
  }

  $update_product_stock=$product_stock-$quantity_value_final;
  $update_prduct_sql = "UPDATE `product` SET `Product_Stock`= ".$update_product_stock." WHERE Product_ID = ".$product_id."";
  $product_update_SQL_exe = mysql_query($update_prduct_sql);
  if (!$product_update_SQL_exe) {
      echo   $update_prduct_sql;
      die('Invalid query: ' . mysql_error());
  }
  else {
    $total_price_value = $product_rent_price*$quantity_value_final;
    $final_submit_SQL = "INSERT INTO `rent`(`Rent_Type`, `Rent_Date`, `Rent_Exp_Date`, `Rent_Price`, `User_ID`, `Product_ID`) VALUES ('1','".$date."','".$ex_date."',".$total_price_value.",".$user_id." ,".$product_id.")";
    $final_submit_SQL_exe = mysql_query($final_submit_SQL);
    if (!$final_submit_SQL_exe) {
        die('Invalid query: ' . mysql_error());
        echo   $final_submit_SQL;
    }
    else {
      header("Location: index.php");
    }
  }
}
?>
