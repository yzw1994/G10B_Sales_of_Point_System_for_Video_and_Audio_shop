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
  <script src="../js/edit_user_profile.js"></script>
  <script>

  </script>
</head>
<body>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2">
        <div id="" class="span_1_of_4 user_pic_div">
          <div id="" class="user_pic_box">

            <img src="<?php echo $row["User_Profile_Pic"]; ?>" id="" class="user_pic_img" name="" title="" alt="<?php echo $row["User_Profile_Pic"]; ?>"/>

            <form action="upload_profile_picture.php?user_id=<?php echo $row['User_ID'];?>" id="upload_profile" enctype="multipart/form-data" method="post">
              <button class="file-upload">
              <input type="file" name="edit_profile_pic" accept="image/x-png, image/gif, image/jpeg" id="edit_profile" class="file-input"/>
              Upload Photo
              </button>

            </form>
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
            <span id="user_name_display" class="user_data_content">
              <span id="user_name_control" class=""><?php echo $row["User_Name"]; ?></span>
              <input type="text" name="edit_user_name_input" id="edit_user_name_input" class="edit_user_name_input_char" value="<?php echo $row["User_Name"]; ?>"/>
            </span>
            <div id="" class="user_data_edit">
              <input type="button" name="edit_user_name" id="edit_user_name_btn" class="" value="EDIT"/>

              <input type="button" name="cancel_user_name" id="cancel_user_name_btn" class="edit_control_char" value="CANCEL"/>
              <input type="button" name="save_user_name" id="save_user_name_btn" class="edit_control_char" value="SAVE"/>
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Contact No
            </span>
            <span id="user_phone_display" class="user_data_content">
              <span id="user_phone_control" class=""><?php echo $row["User_Phone"]; ?></span>
              <input type="number" name="edit_user_phone_input" id="edit_user_phone_input" class="edit_user_phone_input_char" value="<?php echo $row["User_Phone"]; ?>"/>
            </span>
            <div id="" class="user_data_edit">
              <input type="button" name="edit_user_phone" id="edit_user_phone_btn" class="" value="EDIT"/>

              <input type="button" name="cancel_user_phone" id="cancel_user_phone_btn" class="edit_control_char" value="CANCEL"/>
              <input type="button" name="save_user_phone" id="save_user_phone_btn" class="edit_control_char" value="SAVE"/>
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Address
            </span>
            <span id="user_address_display" class="user_data_content">
              <span id="user_address_control" class=""><?php echo $row["User_Address"]; ?></span>
              <textarea name="edit_user_address_input" id="edit_user_address_input" class="edit_user_address_input_char"><?php echo $row["User_Address"]; ?>
              </textarea>
            </span>
            <div id="" class="user_data_edit">
              <input type="button" name="edit_user_address" id="edit_user_address_btn" class="" value="EDIT"/>

              <input type="button" name="cancel_user_address" id="cancel_user_address_btn" class="edit_control_char" value="CANCEL"/>
              <input type="button" name="save_user_address" id="save_user_address_btn" class="edit_control_char" value="SAVE"/>
            </div>
          </div>
          <div id="" class="user_data">
            <span id="" class="user_data_title">
              Birthday
            </span>
            <span id="user_dob_display" class="user_data_content">
              <span id="user_date_control" class=""><?php echo $row["User_Dob"]; ?></span>
              <input type="date(yyyy-mm-dd)" name="edit_user_date_input" id="edit_user_date_input" class="edit_user_date_input_char" value="<?php echo $row["User_Dob"]; ?>"/>
            </span>
            <div id="" class="user_data_edit">
              <input type="button" name="edit_user_date" id="edit_user_date_btn" class="" value="EDIT"/>

              <input type="button" name="cancel_user_date" id="cancel_user_date_btn" class="edit_control_char" value="CANCEL"/>
              <input type="button" name="save_user_date" id="save_user_date_btn" class="edit_control_char" value="SAVE"/>
            </div>
          </div>
        </div>
      </div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
