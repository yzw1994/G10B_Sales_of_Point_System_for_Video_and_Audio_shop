<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
$address = $_REQUEST['address'];
$new_address = "";
if($user_id != "" && $address != ""){
  $insert_new_address_sql = "UPDATE `user` SET `User_address`= '".$address."' WHERE User_ID =".$user_id;
  $insert_new_address_exe = mysql_query($insert_new_address_sql);
  if (!$insert_new_address_exe) {
    die('Invalid query: ' . mysql_error());
    echo $address;
  }
  else{
    $select_address_sql = "select user_address from user where user_id =".$user_id;
    $select_address_exe = mysql_query($select_address_sql);
    $select_address_row = mysql_num_rows($select_address_exe);
    do {
      $new_address = $select_address_row['user_address'];
    }while($select_address_row = mysql_fetch_array($select_address_exe));

    echo $new_address;
  }
}
else {
  echo $address;
}
?>
