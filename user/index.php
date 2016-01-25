<?php 
include("../dataconn/dataconn.php");


	$user_id = $_SESSION['user_id']; 
	$result = mysql_query("select * from user where User_ID = '$user_id'");
	$row = mysql_fetch_assoc($result);
	echo $row['User_Email'];
	if(!$user_id)
{
       header("Location: ../visitor/login.php");
       die();
}	

?>
<DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop 
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
	<div class="cont section group">
	
		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 slider_div">
		<?php include("../utility/slider.php");?>
		</div>
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/leftprod.php");?>
		</div>
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/rightprod.php");?>
		</div>
		<?php include("../utility/footer.php");?>
		
	</div>
</body>
</html>

