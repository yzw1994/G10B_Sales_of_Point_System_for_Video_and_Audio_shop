<?php
	include("../dataconn/dataconn.php");


	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];



	$productQuery = "SELECT * FROM product";
$productList = mysql_query($productQuery) or die(mysql_error());

if(isset($_POST["cart"]))
{
	$product_id = $_POST['pid']; //the product id
	$action = $_POST['action']; //the action
	$quantity = $_POST['quantity'];
	//if there is an product_id and that product_id doesn't exist display an error message


	switch($action)
	{ //decide what to do 
	
	
    case "add":
	if($_SESSION['cart'][$product_id]>0)
	{
		?>
		<script>
		alert("already added");
		window.location.href="checkout.php";
		</script>
		
		<?php
	}else
	{
        $_SESSION['cart'][$product_id] = $quantity;
        header("Location:payment.php");
    }
	break;

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/cart.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/jquery-2.2.0.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
<table border=1>
 <?php
        	while($row = mysql_fetch_assoc($productList))
			{
        		echo '<form name="category" action="" method="post"/>';
        		echo '<tr>';
				
        		echo '<td>'.$row["Product_Name"].'</td>';
   
        		echo '<td>Price: RM'.$row["Product_Price"].'</td>';							
				echo '<td> <input type="hidden" name="quantity"  value="1" ></td>';		
				echo '<td><span style="padding: 5px 9px"><input type="submit" name="cart" value="Add To Cart" /></td>';
        		echo '</tr>';
        		echo '<input type="hidden" name="pid" value="'.$row["Product_ID"].'"/>';
        		echo '<input type="hidden" name="action" value="add"/>';
        		echo '</form>';
        	}
        ?>
</table>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2">
      <div id="" class="cart_prod_div span_5_of_5">
          <a href="../utility/product_page.php" target="_blank" id="" class="cart_prod_link">
            <div id="" class="span_1_of_5 right_border">
              <div id="" class="cart_prod_image">
                <img src="../images/cover1.jpg" id="" class=""/>
              </div>
            </div>
          </a>
          <div id="" class="span_4_of_5">
              <span id="" class="cart_prod_title">
                <a href="../utility/product_page.php" target="_blank" id="" class="cart_prod_link">adelle</a>
              </span>

            <span id="" class="cart_prod_checkbox">
              <input type="checkbox" id="" class="" name=""/>
            </span>
            <span id="" class="cart_prod_description right_border_dotted">
              jshb asjnxja,lsxnajsm xsjanxja asjnxja xbjsvaddssjhsc aksnc kasnnkjx sabxaskcjcnkbckb ashcb bnjxh bmjsa b
            </span>
            <span id="" class="cart_prod_price right_border_dotted">
              RM 9.90
            </span>
            <span id="" class="cart_prod_price right_border_dotted">
							Amount :
							<span id="" class="cart_count_result">
		            1
		          </span>
            </span>
          </div>
      </div>
			<div id="" class="cart_prod_div span_5_of_5">
          <a href="../utility/product_page.php" target="_blank" id="" class="cart_prod_link">
            <div id="" class="span_1_of_5 right_border">
              <div id="" class="cart_prod_image">
                <img src="../images/cover1.jpg" id="" class=""/>
              </div>
            </div>
          </a>
          <div id="" class="span_4_of_5">
              <span id="" class="cart_prod_title">
                <a href="../utility/product_page.php" target="_blank" id="" class="cart_prod_link">adelle</a>
              </span>

            <span id="" class="cart_prod_checkbox">
              <input type="checkbox" id="" class="" name=""/>
            </span>
            <span id="" class="cart_prod_description right_border_dotted">
              jshb asjnxja,lsxnajsm xsjanxja asjnxja xbjsvaddssjhsc aksnc kasnnkjx sabxaskcjcnkbckb ashcb bnjxh bmjsa b
            </span>
            <span id="" class="cart_prod_price right_border_dotted">
              RM 9.90
            </span>
            <span id="" class="cart_prod_price right_border_dotted">
              Amount :
							<span id="" class="cart_count_result">
		            1
		          </span>
            </span>
          </div>
      </div>
      <div id="" class="cart_control_div">

        <span id="" class="cart_select_all right_border_white">
          <input type="checkbox" name="selectall" id="" class="cart_delete_all"/>
          SELECT ALL
        </span>
        <span id="" class="cart_delete_all right_border_white" name="deleteall">
          DELETE ALL
        </span>


        <span id="" class="cart_item_amount right_border_white">
          CHOOSED ITEM :
          <span id="" class="cart_count_result">
            1
          </span>
        </span>

        <span id="" class="cart_count_total">
          TOTAL :
          <span id="" class="cart_count_result">
            RM 9.90
          </span>
        </span>

        <button id="" class="cart_purchase_btn">
          PURCHASE
        </button>
      </div>
		</div>

		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
