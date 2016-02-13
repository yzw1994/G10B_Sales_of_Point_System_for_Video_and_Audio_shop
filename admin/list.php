<?php
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];
	$result = mysql_query("select * from product");
	
?>
<!DOCTYPE html>
<html>
	<head><title>Admin View Product</title>
	<link rel="stylesheet" href="design.css" type="text/css" />
	<script>
		function confirmation()
		{
			answer=confirm("are you sure want to delete?");
			return answer;
		}
	</script>
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

			<table border="1" width="500px">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Description</th>
					<th>Type</th>
					<th>Category</th>
					<th>Status</th>
					<th>Modify</th>
					<th>Delete</th>
				</tr>
			<?php
				while($row = mysql_fetch_assoc($result))
				{
				
				?>
				<tr>
					<td><?php echo $row["Product_ID"];?></td>
					<td><?php echo $row["Product_Name"];?></td>
					<td><?php echo $row["Product_Price"];?></td>
					<td><?php echo $row["Product_Quantity"];?></td>
					<td><?php echo $row["Product_Description"];?></td>
					<td><?php echo $row["Product_Type"];?></td>
					<td><?php echo $row["Product_Category"];?></td>
					<td><?php echo $row["Product_Status"];?></td>
					<td><a href="admin_edit_product.php?pid=<?php echo $row["Product_ID"]; ?>'">Modify</a></td>
					<td><a onclick="return confirmation()" href="admin_delete_product.php?pid=<?php echo $row["Product_ID"]; ?>">Delete</a></td>
				</tr>
				
			<?php
				}
			?>
			</table>
		
		</div>
	</div>
</body>
</html>
