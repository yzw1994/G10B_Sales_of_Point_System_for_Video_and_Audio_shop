
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
				</tr>
				
			<?php
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>
