<?php
include("../dataconn/dataconn.php");
if(!isset($_SESSION))
{
  session_start();
}
$user_id = $_SESSION['user_id'];
$date = $_REQUEST['date'];
$new_date = "";
if($user_id != "" && $date != ""){
  $insert_new_date_sql = "UPDATE `user` SET `User_Dob`= '".$date."' WHERE User_ID =".$user_id;
  $insert_new_date_exe = mysql_query($insert_new_date_sql);
  if (!$insert_new_date_exe) {
    die('Invalid query: ' . mysql_error());
    echo $date;
  }
  else{
    $select_date_sql = "select user_dob from user where user_id =".$user_id;
    $select_date_exe = mysql_query($select_date_sql);
    $select_date_row = mysql_num_rows($select_date_exe);
    do {
      $new_date = $select_date_row['user_dob'];
    }while($select_date_row = mysql_fetch_array($select_date_exe));

    echo $new_date;
  }
}
else {
  echo $date;
}
?>
