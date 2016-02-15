<?php
  include("../dataconn/dataconn.php");
  if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];
	require("../dataconn/page_load.php");
	$user_id = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM user WHERE User_ID = '$user_id'");
	$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin > Index</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/bg_style_black.css" media="screen" />
<script type="text/javascript" src="../Js/jquery-2.2.0.js"></script>
<script type="text/javascript" src="../Js/timer.js"></script>
<style type="text/css">
table
{
	width: 50%;
	margin-left: 180px;
}
</style>
</head>

<?php
 ?>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<img src="../img/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images" style="position:absolute; width: 85px; margin: -15px 0 0 -50px;"/>
				<p id="" class="shop_name" style="font-size:25px;display:;background-color:;width:100%;color:white; margin-left:50px; margin-top:10px;">Blu Video And Audio Shop</p>
			</div>
			<div class="right">
				<div class="align-right">
					<p><span id="timer"></span></p>
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="../admin/index.php">Home</a></li>
				<li class="upp"><a href="#">Rent & Sales</a>
				</li>
				<li class="upp"><a href="#">Coming Soon</a></li>
			</ul>
		</div>
	</div>
	<div id="content">
    <div id="sidebar">
      <div class="box">
        <div class="h_title">Admin Profile</div>
        <div style="background:white; padding: 10px 55px;"><img src="../img/user_photo.gif" style="border:1px solid black; padding: 5px;" /></div>
        <p style="text-align:center; line-height: 20px;">Welcome, <?php echo $row['User_Name'];?></p>
        <ul id="home">
          <li class="b1"><a class="icon profile" href="adminProfile.php" >View profile</a></li>
          <li class="b1"><a class="icon logout" href="../visitor/visitor.php">Log Out</a></li>
        </ul>
      </div>
      <div class="box">
        <div class="h_title">Product</div>
        <ul>
          <li class="b1"><a class="icon add_product" href="admin_addProduct.php">Add Product</a></li>
          <li class="b1"><a class="icon delete_product" href="admin_prodList.php">Product List</a></li>
        </ul>
      </div>
      <div class="box">
        <div class="h_title">Manage Users</div>
        <ul>
          <li class="b3"><a class="icon add_user" href="view_user.php">User List</a></li>
          <li class="b3"><a class="icon delete_user" href="disable_user.php">Disable User</a></li>
        </ul>
      </div>
    </div>
		<div id="main">
			<div class="full_w">
				<div class="h_title">Admin Dashboard</div>
				<form name="" method="get">

				<div>
<table>
	<tr>
		<th>New Products</th>
		<th>Product Picture</th>
	<tr>
<?php
$sql="select * from product where Product_Date=CURDATE()";
$productlist=mysql_query($sql);
while($row = mysql_fetch_assoc($productlist))
{
		echo "<tr>";
		echo "<td>$row[Product_Name]</td>";
		echo "<td><img src=$row[Product_Price]</td>";
		echo "</tr>";
}?>
</table>
<table>
	<tr>
		<th>New Customer</th>
		<th>Profile Picture</th>
	<tr>
<?php
$sql="select * from user where User_Date=CURDATE() and User_Privilege=2";
$productlist=mysql_query($sql);
while($row = mysql_fetch_assoc($productlist))
{
		echo "<tr>";
		echo "<td>$row[User_Name]</td>";
		echo "<td><img src=$row[User_Email]</td>";
		echo "</tr>";
}?>
</table>

				</div>
				</form>
			</div>
		</div>
	</div>
	<div id="footer">
			<p style="text-align:center;">Copyright 2016</p>
	</div>
</div>
</body>
</html>
