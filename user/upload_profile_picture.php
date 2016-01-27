<?php
	require_once('../dataconn/dataconn.php');
	$user_id = $_REQUEST['user_id'];
	$user_query = "SELECT * from `user` WHERE User_ID = '$user_id'";
			$user = mysql_query($user_query);
			$row_user=mysql_fetch_assoc($user);
			$user_total_row = mysql_num_rows($user);
	$old_image = $row_user['User_Profile_Pic'];
	$url = "../images/default_pic.png";

	if($old_image == "" || $old_image == null || $old_image == $url) {
	}
	else {
		unlink($row_user['User_Profile_Pic']);
	}
	if ($_FILES["edit_profile_pic"]["error"] > 0)
	{
	}
	else
	{
		$temp = explode(".",$_FILES["edit_profile_pic"]["name"]);
		$newfilename = $user_id . '.' .end($temp);
		move_uploaded_file($_FILES["edit_profile_pic"]["tmp_name"],"../user/profile_picture/" . $user_id . "U" . $_FILES["edit_profile_pic"]["name"]);

		$file="../user/profile_picture/" . $user_id . "U" . $_FILES["edit_profile_pic"]["name"];
		$sql="update user set User_Profile_Pic = '$file' where User_ID = '$user_id'";

		if (!mysql_query($sql))
		{
			die('Error: ' . mysql_error());
		}

	}


	  header("location:user_profile.php");
	  mysqli_close();
?>
