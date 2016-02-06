<?php 
/* ----------- CATEGORY PAGE ----------------*/
include("dataconn.php");
// get category ID using GET in URL
$itemsQuery = "SELECT * FROM product";
$itemsResult = mysql_query($itemsQuery) or die(mysql_error());
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
		window.location.href="payment.php";
		</script>
		
		<?php
	}else
	{
        $_SESSION['cart'][$product_id] = $quantity;
        header("Location:payment.php");
    }
	break;
    case "remove":
        $_SESSION['cart'][$product_id] = 0;
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
    break;
    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
    break;
	}
}?>
<div class="data-container">
	<?php
	if (isset($_SESSION['flash_msg']) && $_SESSION['flash_msg'] != NULL) 
	{
	    echo '<div class="alert">
	            '.$_SESSION['flash_msg'].'
	          </div>';
	    $_SESSION['flash_msg'] = NULL;
	}
	?>
	<table table border="0" width="100%" height="25px"  class="product"/>
	    <?php
        	while($row = mysql_fetch_assoc($itemsResult))
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
		<a href='payment.php'>check out</a>
		<a href='logout2.php'>logout</a>
	</table>	
</div>
