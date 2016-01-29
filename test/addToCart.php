<?php
	include("dataconn.php");

	$customer_id=$_SESSION["customer_id"]; 
	$result=mysql_query("select * from product");
	$row = mysql_fetch_assoc($result);
	$total=0;
	


	
	if(isset($_POST["cart"])&& $_POST['pid']>0)
{
	$product_id = $_POST['pid']; //the product id
	$action = $_POST['action']; //the action
	$quantity=$_POST['quantity'];
	$total=$_POST['total'];
	$total+=$quantity;
	switch($action)
	{ //decide what to do 

    case "add":
        $_SESSION['cart'][$product_id] = $total;
        $_SESSION['flash_msg'] = "Successfully added to checkout";
    break;

    case "remove":
        $_SESSION['cart'][$product_id] = 0;
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
    break;
	   case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
    break;

  
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
</head>

<body>
<a href="payment.php" target="_blank">checkout</a>
	<form name="loginfrm" action="" method="post">
		<?php if (isset($_SESSION['flash_msg']) && $_SESSION['flash_msg'] != NULL) 
	{
	    echo '<div class="alert">
	            '.$_SESSION['flash_msg'].'
	          </div>';
	    $_SESSION['flash_msg'] = NULL;
	}
		while($row=mysql_fetch_assoc($result))
		{
			
			echo "<form name='loginfrm' action='product.php' method='post'>";
			echo '<input type="hidden" name="pid" value="'.$row['Product_ID'].'"/>';

			echo "<p>$row[Product_Name]</p><p><input type='submit' name='cart' value='Add To Cart' /></p>";
			echo "<input type='hidden' name='quantity' value='1'/>";
			echo "<input type='hidden' name='action' value='add'/>";
			echo "<input type='hidden' name='total' value='".$total."'/>";
				
			echo "</form>";
				
		
		}
		?>
	</form>
<a href="logout2.php">Logout</a>
</body>
</html>

