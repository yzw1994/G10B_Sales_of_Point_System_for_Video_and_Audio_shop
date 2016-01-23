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
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Modify</th>
				</tr>
			<?php
				while($row = mysql_fetch_assoc($result))
				{
				
				?>
				<tr>
					<td><?php echo $row["product_id"];?></td>
					<td><?php echo $row["product_name"];?></td>
					<td><?php echo $row["price"];?></td>
					<td><?php echo $row["quantity"];?></td>
					<td><a href="admin_edit_product.php?pid=<?php echo $row["product_id"]; ?>'">Modify</a></td>
					<td><a onclick="return confirmation()" href="admin_delete_product.php?pid=<?php echo $row["product_id"]; ?>">Delete</a></td>
				</tr>
				
			<?php
				}
			?>
			</table>
		
		</div>
	</div>
</body>
</html>
