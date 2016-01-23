<?php
	include("dataconn.php");
	
	$sess_aid = $_SESSION["admin_id"];
	
	$result = mysql_query("select * from admin where admin_id = $sess_aid");
	$row = mysql_fetch_assoc($result);
	
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin Dashboard</title>
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
			<h2>Welcome<?php echo $row["admin_name"];?></h2>
			
			<p>
				ID : <?php echo $row["admin_id"];?>
			</p>
			
			<p>
				Name : <?php echo $row["admin_name"];?>
			</p>
			
			<p>
				Username : <?php echo $row["ad_username"];?>
			</p>
			
			<p><input type="submit" name="logoutbtn" value="Logout" onclick="window.location='logout.php';"/></p>
		</div>
	</div>
</body>
</html>

<?php

 
if(!$sess_aid)
{
       header("Location: login.php");
       die();
}
?>
