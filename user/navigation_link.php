<?php
	include("../dataconn/dataconn.php");


	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];

	require("../dataconn/page_load.php");

  $category_id = $_REQUEST['cat'];
  $destination_link = "";
  if($category_id == 1){
    $destination_link = "../utility/highlights.php";
  }
  else if($category_id == 2){
    $destination_link = "../utility/video.php";
  }
  else if($category_id == 3){
      $destination_link = "../utility/audio.php";
  }
  else if($category_id == 4){
      $destination_link = "../utility/comingsoon.php";
  }
  else if($category_id == 5){
      $destination_link = "../utility/highlights.php";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/jquery-2.2.0.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element1 col span_2_of_2 pro_char">
			<?php include($destination_link);?>
		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
