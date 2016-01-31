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
  }while($product_row = mysql_fetch_array($product_exe));

  $quantity_value_final = $_POST['quantity_value_final'];
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
?>
