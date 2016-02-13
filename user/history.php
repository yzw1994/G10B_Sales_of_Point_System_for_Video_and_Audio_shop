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
    <div class="cont_element1 col span_5_of_5 pro_char control_transaction_btn_div" >
      <input type="button" id='show_buy_div_history_btn' class="transaction_buy_btn" name="display_buy_history_btn" value="buy"/>
      <input type="button" id='show_rent_div_history_btn' class="transaction_rent_btn" name="display_rental_history_btn" value="rent"/>
    </div>
		<div id='buy_history_div_control' class="cont_element1 col span_5_of_5 pro_char">
      <?php
        $row_counter = 1;
        $subtotal=0;
        $select_distinct_date_sql = "SELECT distinct sold_date FROM `sold` WHERE user_id=".$user_id;
        $select_distinct_date_exe = mysql_query($select_distinct_date_sql);
        $select_distinct_date_row = mysql_num_rows($select_distinct_date_exe);
        if(!$select_distinct_date_row){
          echo "You are not buying anything yet!";
        }
        else {
          while($select_distinct_date_row = mysql_fetch_array($select_distinct_date_exe)){
            $transaction_date = $select_distinct_date_row['sold_date'];
            echo "<div id='' class='transaction_date'>
              <span id='' class='transaction_date_char'>
              <span id='' class='date_title_char'>Date : </span>
              ".$transaction_date."</span>";
            $transaction_history = "SELECT * FROM `sold` inner join product WHERE sold.prodcut_ID = product.product_ID  and sold.user_id = ".$user_id." and sold.sold_date='".$transaction_date."'";
            $transaction_history_exe = mysql_query($transaction_history);
            $transaction_history_row = mysql_num_rows($transaction_history_exe);

            if($transaction_history_row){
              while($transaction_history_row = mysql_fetch_array($transaction_history_exe)){
                echo "
                <a href='../utility/product_page_login.php?product_id=".$transaction_history_row['Product_ID']."' class='transaction_link_char' target='_blank'>
                <div id='' class='transaction_row'>
                  <div id='' class='transaction_numbering_div'>".$row_counter.".</div>
                  <div id='' class='transaction_product_pic_div'>
                    <img src='".$transaction_history_row['Product_Pic']."' name='".$transaction_history_row['Product_Name']."'
                    alt='".$transaction_history_row['Product_Name']."' />
                  </div>
                  <div id='' class='Transaction_detail'>
                    <span id='' class='detail_title_char'>Name :</span>
                    <span id='' class='detail_content_char'>".$transaction_history_row['Product_Name']."</span>
                    <span id='' class='detail_title_char'>Quantity :</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Quantity']."</span>
                    <span id='' class='detail_title_char'>Price : RM</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Product_Price']."</span>
                    <span id='' class='detail_title_char'>Total Price : RM</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Sold_Price']."</span>
                    </span>
                  </div>

                </div>
                </a>";
                $row_counter++;
                $subtotal += $transaction_history_row['Sold_Price'];
              };
            }
            echo "
              <div id='' class='transaction_subtotal_div'>
                Sub-Total : RM
                  <span id='' class='transaction_subtotal_value'>".$subtotal."
                  </span>
              </div>
            </div>";

          };
        }


      ?>
		</div>
    <div id='rent_history_div_control' class="cont_element1 col span_5_of_5 pro_char">
      <?php
        $row_counter = 1;
        $subtotal=0;
        $select_distinct_date_sql = "SELECT distinct rent_date, Rent_Exp_Date FROM `rent` WHERE user_id=".$user_id;
        $select_distinct_date_exe = mysql_query($select_distinct_date_sql);
        $select_distinct_date_row = mysql_num_rows($select_distinct_date_exe);
        if(!$select_distinct_date_row){
          echo "You are not buying anything yet!";
        }
        else {
          while($select_distinct_date_row = mysql_fetch_array($select_distinct_date_exe)){
            $transaction_date = $select_distinct_date_row['rent_date'];
            $transaction_exp_date = $select_distinct_date_row['Rent_Exp_Date'];
            echo "<div id='' class='transaction_date'>
              <span id='' class='transaction_date_char'>
              <span id='' class='date_title_char'>Date : </span>
              ".$transaction_date."&nbsp;
              <span id='' class='date_title_char'>Expire Date : </span>
              <span id='' class='date_exp_value'>".$transaction_exp_date."</span>
              </span>";
            $transaction_history = "SELECT * FROM `rent` inner join product WHERE rent.product_ID = product.product_ID  and rent.user_id = ".$user_id." and rent.rent_date='".$transaction_date."'";
            $transaction_history_exe = mysql_query($transaction_history);
            $transaction_history_row = mysql_num_rows($transaction_history_exe);

            if($transaction_history_row){
              while($transaction_history_row = mysql_fetch_array($transaction_history_exe)){
                echo "
                <a href='../utility/product_page_login.php?product_id=".$transaction_history_row['Product_ID']."' class='transaction_link_char' target='_blank'>
                <div id='' class='transaction_row'>
                  <div id='' class='transaction_numbering_div'>".$row_counter.".</div>
                  <div id='' class='transaction_product_pic_div'>
                    <img src='".$transaction_history_row['Product_Pic']."' name='".$transaction_history_row['Product_Name']."'
                    alt='".$transaction_history_row['Product_Name']."' />
                  </div>
                  <div id='' class='Transaction_detail'>
                    <span id='' class='detail_title_char'>Name :</span>
                    <span id='' class='detail_content_char'>".$transaction_history_row['Product_Name']."</span>
                    <span id='' class='detail_title_char'>Quantity :</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Rent_Quantity']."</span>
                    <span id='' class='detail_title_char'>Price : RM</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Product_Rent_Price']."</span>
                    <span id='' class='detail_title_char'>Total Price : RM</span>
                    <span id='' class='detail_content_char1'>".$transaction_history_row['Rent_Price']."</span>
                    </span>
                  </div>

                </div>
                </a>";
                $row_counter++;
                $subtotal += $transaction_history_row['Rent_Price'];
              };
            }
            echo "
              <div id='' class='transaction_subtotal_div'>
                Sub-Total : RM
                  <span id='' class='transaction_subtotal_value'>".$subtotal."
                  </span>
              </div>
            </div>";

          };
        }


      ?>
		</div>
    <!--
      <?php
        $row_counter = 1;
        $transaction_history = "SELECT * FROM `rent` inner join product WHERE rent.product_ID = product.product_ID  and rent.user_id = ".$user_id;
        $transaction_history_exe = mysql_query($transaction_history);
        $transaction_history_row = mysql_num_rows($transaction_history_exe);

        if(!$transaction_history_row){
          echo "You are not buying anything yet!";
        }
        else {
          while($transaction_history_row = mysql_fetch_array($transaction_history_exe)){
            echo "
            <div id='' class='transaction_row'>".$row_counter.".
              <div id='' class='transaction_numbering_div'>".$row_counter.".</div>
            ".$transaction_history_row['Rent_Quantity']."&nbsp;
            ".$transaction_history_row['Rent_Price']."&nbsp;
            ".$transaction_history_row['Rent_Date']."&nbsp;
            ".$transaction_history_row['Rent_Exp_Date']."<br>
            </div>";
            $row_counter++;
          };
        }

      ?>
		</div>-->

		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
