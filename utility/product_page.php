<?php
  include("../dataconn/dataconn.php");
	if(!isset($_SESSION))
	{
		$header_page = "../utility/header.php";
	}
	else {
		$header_page = "../utility/user_header.php";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/product.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
	<div class="cont section group">

		<?php include($header_page);?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 ">
      <div id="" class="product_content_div">
        <div id="" class="product_cover">
          ss
        </div>
        <div id="" class="product_content_name">
          www
        </div>

      </div>
		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
