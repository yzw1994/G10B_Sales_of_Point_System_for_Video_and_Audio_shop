<?php
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];
	$result = mysql_query("select * from admin where admin_id = '$sess_aid'");
	$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
	<head><title>Admin Add Profile</title>
	<link rel="stylesheet" href="design.css" type="text/css" />
</head>

<body>
	<div class="main">
		<div class="cleft">
			<ul>
				<li><a href="admin_dashboard.php">Dashboard</a></li>
				<li><a href="admin_edit_profile.php">Edit Profile</a> </li>
				<li><a href="admin_add_product.php">Add Product</a></li>
				<li><a href="admin_view_product.php">View Product</a></li>
			</ul>
		</div>
		
		<div class="cright">
			<form name="addfrm" method="post" action="">
				<p>Product_name : <input type="text" name="pname" size="80"/>
				<p>Price : <input type="text" name="pprice" size="10" />
				<p>Quantity : <input type="number" name="pqty" size="10" />
				<p><input type="submit" name="addbtn" value="Add Now" /></p>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['addbtn']))
	{
		
		$prodname = $_POST["pname"];
		$prodprice = $_POST['pprice'];
		$prodqty = $_POST['pqty'];
		$row=mysql_query("insert into product(product_name,price,quantity,admin_id)values
		('$prodname','$prodprice','$prodqty',$sess_aid)");
	
		header("Location: admin_dashboard.php");
	}
?>
