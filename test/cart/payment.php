<?php 
/* ----------- ADD TO CART PAGE ----------------*/
include("dataconn.php");
$product_id = isset($_GET['pid']) ? $_GET['pid'] : null; 
$action = isset($_GET['action']) ? $_GET['action'] : null; //the action
$total=0;
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
            
            //along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
           
		   echo "<td align=\"center\">".$itemsInfo["Product_Name"]."</td>";
			echo "<td align=\"center\">".$itemsInfo["Product_Price"]."</td>";

		
			 echo "<td align=\"center\">
			<form name=\"addQuantity\" action=\"btnAddQuantity.php?pid=$product_id\" method=\"POST\">
			<input type=\"number\" name=\"qty\" value=\"$quantity\"> 
			
			<input type=\"submit\" name=\"add_qty\" value=\"Add\" id=\"button1\"/>
			</form>	
			</td>";
			
	
			echo "<td align=\"center\">RM $cost</td>";
			echo "<td align=\"center\"><a href=\"$_SERVER[PHP_SELF]?action=remove&pid=$product_id\"><img src=\"images/delete.gif\"/></a></td>";
            echo "</tr>";
        }
    }
	  echo "<tr>";
	echo "<td colspan=\"2\" ></td>";
    echo "<td align=\"center\">Total</td>";
    echo "<td colspan=\"2\" align=\"center\">RM $total</td>";
    echo "</tr>";
    echo "</table>";
    }
    //show the total
  

	
	
	?>
	<br>
	<div>
	<span style="margin-left: 88%"><a href="productlist.php">back to shopping</a></span>
	</div>
	

	</html>
