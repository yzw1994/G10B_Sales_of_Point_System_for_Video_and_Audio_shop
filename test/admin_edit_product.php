<?php
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];

	$product_id        = (int)$_GET['pid'];	
	$result = mysql_query("select * from product where product_id=$product_id");
	$row = mysql_fetch_assoc($result);


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Edit Profile</title>
		<link rel="stylesheet" href="design.css" type="text/css" />
	</head>
<body>
	<div class="main">
		<div class="cleft">
			<ul>
				<li><a href="admin_dashboard.php">Dashboard</a></li>
				<li><a href="admin_edit_profile.php">Edit Profile</a> </li>
				<li><a href="admin_add_product.php">Add New Product</a></li>
				<li><a href="admin_view_product.php">View Product</a></li>
			</ul>
		</div>
	
		<div class="cright">
			<form name="editfrm" method="post" action="">
				<p>ID : <?php echo $row["product_id"];?> </p>
				<p>Name : <input type="text" name="product_name" value="<?php echo $row['product_name'];?> "/></p>
				<p>Quantity : <input type="text" name="quantity" value="<?php echo $row['quantity'];?>"/></p>
				<p>Price : <input type="price" name="price" value="<?php echo $row['price'];?>"/></p>
				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST["updatebtn"]))
	{
		$product_id=$row['product_id'];
		$product_name = $_POST["product_name"];
		$quantity = $_POST["quantity"];
		$price = $_POST["price"];
		
		mysql_query("update product set product_name = '$product_name',quantity ='$quantity', price = $price, admin_id = '$sess_aid' where product_id='$product_id'");
	?>
	<script>
		alert("One record saved");
	</script>
	
	<?php
		header("Location:admin_view_product.php");
	}
?>
