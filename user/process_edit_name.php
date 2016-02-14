<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
$name = $_REQUEST['name'];
$new_name = "";
if($user_id != "" && $name != ""){
  $insert_new_name_sql = "UPDATE `user` SET `User_Name`= '".$name."' WHERE User_ID =".$user_id;
  $insert_new_name_exe = mysql_query($insert_new_name_sql);
  if (!$insert_new_name_exe) {
    die('Invalid query: ' . mysql_error());
    echo $name;
  }
  else{
    $select_name_sql = "select user_name from user where user_id =".$user_id;
    $select_name_exe = mysql_query($select_name_sql);
    $select_name_row = mysql_num_rows($select_name_exe);
    do {
      $new_name = $select_name_row['user_name'];
    }while($select_name_row = mysql_fetch_array($select_name_exe));

    echo $new_name;
  }
}
else {
  echo $name;
}
?>
