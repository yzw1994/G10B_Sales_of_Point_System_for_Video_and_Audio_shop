<?php/*
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];
	$result = mysql_query("select * from admin where admin_id = '$sess_aid'");
	$row = mysql_fetch_assoc($result);*/
?>

<?php/*
	if(isset($_POST['addbtn']))
	{

		$prodname = $_POST["pname"];
		$prodprice = $_POST['pprice'];
		$prodqty = $_POST['pqty'];
		$description=$_POST['description'];
		$type=$_POST['ptype'];
		$category=$_POST['category'];
		$status=$_POST['status'];

		mysql_query("insert into product(Product_Name,Product_Description,Product_Quantity,Product_Type,Product_Category,Product_Price,Product_Status)values
		('$prodname','$description','$prodqty','$type','$category','$prodprice','$status')");
		header("Location:list.php")

	*/
	}
?>
<!DOCTYPE html>
<html>
	<head><title>Admin Add Product</title>
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
			<form name="addfrm" method="post" action=""  ENCTYPE=multipart/form-data>
				<p>Product_name : <input type="text" name="pname" size="80"/>
				<p>Price : <input type="text" name="pprice" size="10" />
				<p>Quantity : <input type="number" name="pqty" size="10" />
				<p>Description: <input type="text" name="description"/></p>
				<p>Type: <input type="text" name="ptype"/></p>
				<p>Category: <input type="text" name="category"/></p>
				<p>Status:
					<select name="status">
						<option value="active">active</option>
						<option value="unactive">unactive</option>
					</select>
				</p>
				<p><input type="submit" name="addbtn" value="Add Now" /></p>
			</form>
		</div>
	</div>
</body>
</html>
