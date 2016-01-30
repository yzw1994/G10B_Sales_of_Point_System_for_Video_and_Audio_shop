<?php 
/* ----------- ADD TO CART PAGE ----------------*/
include("dataconn.php");
$product_id = isset($_GET['pid']) ? $_GET['pid'] : null; 
$action = isset($_GET['action']) ? $_GET['action'] : null; //the action
?>

<html>
<head>
    <title>View Cart</title>
  

</head>
<body>

<?php 
$customer_id=$_SESSION['customer_id'];


$result=mysql_query("select * from product");
$row=mysql_fetch_assoc($result);

switch($action) 
{ 
//decide what to do 

case "add":
    $_SESSION['cart'][$product_id] = $quantity;
break;

case "remove":
    $_SESSION['cart'][$product_id] = 0;
    unset($_SESSION['cart'][$product_id]);
	header("Location: payment.php");//if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
break;

case "empty":
    unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
	header("Location: payment.php");
break;
}

//------- for checkout ---------

if(isset($_SESSION['cart']) && $_SESSION['cart']) { 

	$total = 0;
	echo "<form name='cart' method='POST' action=''>";
    echo "<table border=\"1\" padding=\"3\" width=\"100%\" class=\"data-container\">"; 
	 echo "<td colspan=\"4\" align=\"right\"><a href=\"payment.php?action=empty\" onclick=\"return confirm('Are you sure?');\"><img src=\"image/delete.png\"/></a></td>";

   
    foreach($_SESSION['cart'] as $product_id => $quantity) 
	{ 

        $sql = sprintf("SELECT * FROM product WHERE Product_ID = %d;", $product_id); 

        $result = mysql_query($sql);


        if(mysql_num_rows($result) > 0)
		{

            $itemsInfo = mysql_fetch_assoc($result);

            $cost = $itemsInfo["Product_Price"] * $quantity;
            $total = $total + $cost; //add to the total cost

            echo "<tr>";
           
            //show this information in table cells
            echo "<td align=\"center\">".$itemsInfo["Product_Name"]."</td>";
            //along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
            echo "<td align=\"center\">$quantity </td>";
            echo "<td align=\"center\">RM $cost</td>";
			 echo "<td align=\"center\"><a href=\"payment.php?action=remove&pid=$product_id\"><img src=\"image/remove.png\"/></a></td>";
            echo "</tr>";
        }
    }

    //show the total
    echo "<tr>";
	echo "<td colspan=\"2\" ></td>";
    echo "<td align=\"center\">Total</td>";
    echo "<td colspan=\"2\" align=\"center\">RM $total</td>";
    echo "</tr>";
    echo "</table>";
	echo "</form>";
	}
	
	?>
	<br>
	<div>
	<span style="margin-left: 88%"><a href="product.php"><input type="submit" name="shopping_more"  class="custom-button" value="Back To Shopping"/></a></span>
	</div>
	

	</html>
