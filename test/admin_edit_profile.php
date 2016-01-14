<?php
	include("dataconn.php");
	$sess_aid = $_SESSION["admin_id"];
	$result = mysql_query("select * from admin where admin_id = '$sess_aid'");
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
				<p>ID : <?php echo $row["admin_id"];?>
				<p>Name : <input type="text" name="aname" value=" <?php echo $row['admin_name'];?> "/>
				<p>Username : <input type="text" name="auser" value="<?php echo $row['ad_username'];?>"/>
				<p>Password : <input type="password" name="apass" value="<?php echo $row['admin_password'];?>"/>
				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST["updatebtn"]))
	{
		$adname = $_POST["aname"];
		$aduser = $_POST["auser"];
		$adpass = $_POST["apass"];
		
		mysql_query("update admin set admin_name = '$adname',ad_username = '$aduser', admin_password = '$adpass' where admin_id = $sess_aid ");
	?>
	<script>
		alert("One record saved");
	</script>
	
	<?php
		header("refresh:0.5;url=admin_dashboard.php");
	}
?>
