<?php
  include("../dataconn/dataconn.php");
  if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];

	require("../dataconn/page_load.php");

	$user_id = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM user WHERE User_ID = '$user_id'");
	$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/user_profile.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/main.js"></script>
  <script src="../js/jquery-2.2.0.js"></script>
</head>
<body>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2">
        <div id="" class="span_1_of_4 user_pic_div">
          <div id="" class="user_pic_box">

            <img src="<?php echo $row["User_Profile_Pic"]; ?>" id="" class="user_pic_img" name="" title=""/>

          </div>
        </div>
        <div id="" class="span_3_of_4 user_detail_div">
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Email
            </span>
            <span id="" class="user_data_content">
							<?php echo $row["User_Email"]; ?>
            </span>
            <div id="" class="user_data_edit">
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Name
            </span>
            <span id="" class="user_data_content">
              <?php echo $row["User_Name"]; ?>
            </span>
            <div id="" class="user_data_edit">
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Contact No
            </span>
            <span id="" class="user_data_content">
              <?php echo $row["User_Phone"]; ?>
            </span>
            <div id="" class="user_data_edit">
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Address
            </span>
            <span id="" class="user_data_content">
              <?php echo $row["User_Address"]; ?>
            </span>
            <div id="" class="user_data_edit">
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Birthday
            </span>
            <span id="" class="user_data_content">
              <?php echo $row["User_Dob"]; ?>
            </span>
            <div id="" class="user_data_edit">
            </div>
          </div>
        </div>
      </div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
