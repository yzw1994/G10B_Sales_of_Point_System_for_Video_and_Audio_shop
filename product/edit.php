<?php
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];

	$product_id        = (int)$_GET['pid'];	
	$result = mysql_query("select * from product where Product_ID=$product_id");
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
			<form name="editfrm" method="post" action=""  ENCTYPE=multipart/form-data>
				<p>ID : <?php echo $row["Product_ID"];?> </p>
				<p>Name : <input type="text" name="pname" value="<?php echo $row['Product_Name'];?> "/></p>
				<p>Price : <input type="price" name="pprice" value="<?php echo $row['Product_Price'];?>"/></p>
				<p>Quantity : <input type="text" name="pqty" value="<?php echo $row['Product_Quantity'];?>"/></p>
				<p>Description : <input type="text" name="description" value="<?php echo $row['Product_Description'];?>"/></p>
				<p>Type : <input type="text" name="ptype" value="<?php echo $row['Product_Type'];?>"/></p>
				<p>Description : <input type="text" name="category" value="<?php echo $row['Product_Category'];?>"/></p>
				<p>Status:
					<select name="status">
						<option value="active" <?php if ($row['Product_Status'] == "active")  echo "selected";  ?>>active</option>
						<option value="unactive" <?php if ($row['Product_Status'] == "unactive") echo "selected='selected' "  ?>>unactive</option>
					</select>
				</p>
				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST["updatebtn"]))
	{
		
		$prodname = $_POST["pname"];
		$prodprice = $_POST['pprice'];
		$prodqty = $_POST['pqty'];
		$description=$_POST['description'];
		$type=$_POST['ptype'];
		$category=$_POST['category'];
		$status=$_POST['status'];
		
		mysql_query("update product set Product_Name='$prodname',Product_Description='$description',Product_Quantity='$prodqty',Product_Type='$type',Product_Category='$category',Product_Price='$prodprice',Product_Status='$status' where Product_ID='$product_id'");
	?>
	<script>
		alert("One record saved");
	</script>
	
	<?php
		header("Location:admin_view_product.php");
	}
?>
