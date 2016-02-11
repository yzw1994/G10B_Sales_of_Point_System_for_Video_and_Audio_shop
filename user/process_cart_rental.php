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

if($user_id != "" && $cart_id != ""){
  $cart_id_array = explode(",", $cart_id);
  $quantity_value_array = explode(",", $quantity_value);
  for($i=0;$i<sizeof($cart_id_array);$i++){
    $extract_product_id_sql = "select * from cart where cart_id = ".$cart_id_array[$i].";";
    $extract_product_id_exe = mysql_query($extract_product_id_sql);
    $extract_product_id_row = mysql_num_rows($extract_product_id_exe);
    do {
      $product_id[$i] = $extract_product_id_row['Product_ID'];
    }while($extract_product_id_row = mysql_fetch_array($extract_product_id_exe));
  }

  for($k=0;$k<sizeof($cart_id_array);$k++){
      
  }
}
else {
  echo "FAIL";
}

?>
