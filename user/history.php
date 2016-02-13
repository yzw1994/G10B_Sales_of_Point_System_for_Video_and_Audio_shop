<?php
	include("../dataconn/dataconn.php");


	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];

	require("../dataconn/page_load.php");


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
      <?php
        $row_counter = 1;
        $transaction_history = "select * from sold where user_id =".$user_id;
        $transaction_history_exe = mysql_query($transaction_history);
        $transaction_history_row = mysql_num_rows($transaction_history_exe);

        if(!$transaction_history_row){
          echo "You are not buying anything yet!";
        }
        else {
          while($transaction_history_row = mysql_fetch_array($transaction_history_exe)){
            echo "
            ".$row_counter.".
            ".$transaction_history_row['Prodcut_ID']."&nbsp;
            ".$transaction_history_row['Quantity']."&nbsp;
            ".$transaction_history_row['Sold_Price']."&nbsp;
            ".$transaction_history_row['Sold_Date']."<br>
            ";
            $row_counter++;
          };
        }

      ?>
		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
