<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
$phone = $_REQUEST['phone'];
$new_phone = "";
if($user_id != "" && $phone != ""){
  $insert_new_phone_sql = "UPDATE `user` SET `User_phone`= '".$phone."' WHERE User_ID =".$user_id;
  $insert_new_phone_exe = mysql_query($insert_new_phone_sql);
  if (!$insert_new_phone_exe) {
    die('Invalid query: ' . mysql_error());
    echo $phone;
  }
  else{
    $select_phone_sql = "select user_phone from user where user_id =".$user_id;
    $select_phone_exe = mysql_query($select_phone_sql);
    $select_phone_row = mysql_num_rows($select_phone_exe);
    do {
      $new_phone = $select_phone_row['user_phone'];
    }while($select_phone_row = mysql_fetch_array($select_phone_exe));

    echo $new_phone;
  }
}
else {
  echo $phone;
}
?>
