<?php 
	include("../dataconn/dataconn.php");
	
	if(!isset($_REQUEST['userid'], $_REQUEST['email'], $_REQUEST['contact'], $_REQUEST['username'])) {
		$status = "false";
		$message = "missing parameters";
		$data = "";
	}
	else {
		$userid = $_REQUEST['userid'];
		$email = $_REQUEST['email'];
		$contact = $_REQUEST['contact'];
		$username = $_REQUEST['username'];
		
		$sql = "UPDATE user SET User_Email='$email', User_Phone='$contact', User_Name='$username' WHERE User_ID='$userid'";
		
		$result = mysql_query($sql);
		if(!$result) {
			$status = "false";
			$message = "update unsuccessful";
		}
		else {
			$status = "true";
			$message = "update successfully";
		}
	}
	
	$output = '{"status" : "' . $status . '", "message" : "' . $message . '", "data" : "'. $data .'"}';
	echo $output;
?>