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
  $result1 = mysql_query("SELECT * FROM product");
	$row = mysql_fetch_assoc($result);
  $row1 = mysql_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin > Index</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/bg_style_black.css" media="screen" />
<script type="text/javascript" src="../Js/jquery-2.2.0.js"></script>
<script type="text/javascript" src="../Js/timer.js"></script>
<style type="text/css">
table
{
	width: 800px;
	margin-left: 10px;

}
.name{
  width:100px;
}
.des{
  width:10px;
}
.cat{

}
.pri{

}
.rpri{

}
.stk{

}
.dat{

}
.sta{

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
				<li class="upp"><a href="../visitor/visitor.php">Home</a></li>
				<li class="upp"><a href="#">Rent & Sales</a>
					<ul>
						<li><a href="">List of video</a></li>
						<li><a href="">Transaction History</a></li>
					</ul>
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
					<li class="b1"><a class="icon profile" href="" >View profile</a></li>
					<li class="b1"><a class="icon logout" href="../visitor/visitor.php">Log Out</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">Product</div>
				<ul>
          <li class="b1"><a class="icon add_product" href="admin_addProduct.php">Add Product</a></li>
					<li class="b2"><a class="icon delete_product" href="">Delete Product</a></li>
					<li class="b2"><a class="icon delete_product" href="admin_prodList.php">Product List</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">Graph</div>
				<ul>
					<li class="b1"><a class="icon delete_product" href="">View Report</a></li>
				</ul>
			</div>
			<div class="box">
				<div class="h_title">Manage Users</div>
				<ul>
					<li class="b1"><a class="icon add_user" href="add_user.php">User List</a></li>
					<li class="b2"><a class="icon delete_user" href="delete_user.php">Disable User</a></li>
				</ul>
			</div>
		</div>
		<div id="main" class="content">
			<div class="full_w">
				<div class="h_title" >Product Added</div>
				<form name="" method="get">

				<!-- <div> -->
					<table style="font-size: 15px; width:100px;">
              <tr>
      					<th class="">Name</th>
      					<th class="">Description</th>
      					<th class="">Category</th>
      					<th class="">Price</th>
      					<th class="">Rent price</th>
      					<th class="">Stock</th>
      					<th class="">Date</th>
      					<th class="">Status</th>
                <th class="">Status</th>
                <th class="">Status</th>
      				</tr>
      			<?php
      				while($row1 = mysql_fetch_assoc($result1))
      				{

      				?>
      				<tr>
      					<td class="nam"><?php echo $row1["Product_Name"];?></td>
                <td class="des"><?php echo $row1["Product_Description"];?></td>
                <td class="cat"><?php echo $row1["Product_Category"];?></td>
      					<td class="pri"><?php echo $row1["Product_Price"];?></td>
      					<td class="rpri"><?php echo $row1["Product_Rent_Price"];?></td>
      					<td class="stk"><?php echo $row1["Product_Stock"];?></td>
      					<td class="dat"><?php echo $row1["Product_Date"];?></td>
      					<td class="sta"><?php echo $row1["Product_Status"];?></td>
      					<td class=""><a href="admin_edit_product.php?pid=<?php echo $row["Product_ID"]; ?>'">Modify</a></td>
      					<td class=""><a onclick="return confirmation()" href="admin_delete_product.php?pid=<?php echo $row["Product_ID"]; ?>">Delete</a></td>
      				</tr>

      			<?php
      				}
      			?>
					</table>
				<!-- </div> -->
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
