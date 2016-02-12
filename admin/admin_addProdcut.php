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

<?php
	if(isset($_POST['addbtn']))
	{

		$prodname = $_POST["pname"];
		$proddes = $_POST['pdesc'];
		$prodcat = $_POST['pcat'];
		$prodpri=$_POST['ppri'];
		$prodrentpri=$_POST['prent'];
		$prodstoc=$_POST['pstoc'];
		$prodstatus=$_POST['pstat'];

		mysql_query("INSERT into product (Product_Name,Product_Description,Product_Category,Product_Price,Product_Rent_Prince,Product_Stock,Product_Status) values
		('$prodname','$proddes','$prodcat','$prodpri','$prodrentpri','$prodstoc','$prodstatus')");
		header("Location:index.php");
  }
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
	width: 50%;
	margin-left: 180px;
}
</style>
</head>


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
					<li class="b1"><a class="icon add_product" href="">Add Product</a></li>
					<li class="b2"><a class="icon delete_product" href="">Delete Product</a></li>
					<li class="b2"><a class="icon delete_product" href="">Product List</a></li>
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
		<div id="main">
			<div class="full_w">
				<div class="h_title">Admin Panel</div>
          <!--Upload Product Picture-->
				<div>
          <form name="productDetails" method="POST">
            <table>
              <tr>
                <td>Name</td>
                <td><input type="text" name="pname" size="67"/></td>
              </tr>

              <tr>
                <td>Description</td>
                <td><textarea rows="3" cols="51" name="pdesc"></textarea></td>
              </tr>

              <tr>
                <td>Category</td>
                <td><input type="text" name="pcat" size="67"/></td>
              </tr>

              <tr>
                <td>Price</td>
                <td><input type="text" name="pprice" size="67"/></td>
              </tr>

              <tr>
                <td>Rent price</td>
                <td><input type="text" name="prent" size="67"/></td>
              </tr>

              <tr>
                <td>Stock</td>
                <td><input type="text" name="pstoc" size="67"/></td>
              </tr>

              <tr>
                <td>Status</td>
                <td><select name="pstat">
      						<option value="active">Active</option>
      						<option value="unactive">Inactive</option>
      					</select></td>
              </tr>

              <tr>
                <td></td>
                <td></td>
              </tr>
  					</table>

          <div style="margin-left: 180px;">
						<button class="add" name="addbtn" type="submit"  style="background: #F3F3F3 url(../img/i_edit.png) no-repeat 4px center; padding-left: 25px;">Add Now</button>
					</div>
          </form>
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
