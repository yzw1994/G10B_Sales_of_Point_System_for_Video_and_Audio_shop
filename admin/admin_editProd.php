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
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/bg_style_black.css" media="screen" />
<script type="text/javascript" src="../Js/jquery-2.2.0.js"></script>
<script type="text/javascript" src="../Js/timer.js"></script>

<script type="text/javascript">
  function confirmation()
  {
    answer=confirm("Delete [Yes or No]?");
    return answer;
  }
</script>

<style type="text/css">
table
{
	width: 800px;
	margin-left: 10px;

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
    <div id="main">
      <div class="full_w">
        <div class="h_title">Product List</div>
        <form name="editfrm" method="post" action=""  ENCTYPE=multipart/form-data>
  				<p>Name : <input type="text" name="pname" value="<?php echo $row1['Product_Name'];?> "/></p>
  				<p>Description : <input type="text" name="des" value="<?php echo $row1['Product_Description'];?>"/></p>
  				<p>Category : <input type="text" name="cat" value="<?php echo $row1['Product_Category'];?>"/></p>
  				<p>Price : <input type="text" name="pri" value="<?php echo $row1['Product_Price'];?>"/></p>
  				<p>Rent Price : <input type="text" name="rpri" value="<?php echo $row1['Product_Rent_Price'];?>"/></p>
  				<p>Stock : <input type="text" name="stk" value="<?php echo $row1['Product_Stock'];?>"/></p>
          <p>Date : <input type="date" name="dat" value="<?php echo $row1['Product_Date'];?>"/></p>
  				<p>Status:
  					<select name="status">
  						<option value="active" <?php if ($row1['Product_Status'] == "active")  echo "selected";  ?>>active</option>
  						<option value="unactive" <?php if ($row1['Product_Status'] == "unactive") echo "selected='selected' "  ?>>unactive</option>
  					</select>
  				</p>
  				<p><input type="submit" name="updatebtn" value="Update Now" /></p>
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

<?php
	if(isset($_POST["updatebtn"]))
	{

		$prodname = $_POST["pname"];
		$proddes = $_POST['des'];
		$prodcat = $_POST['cat'];
		$prodpri=$_POST['pri'];
		$prodRpri=$_POST['rpri'];
    $stk=$_POST['stk'];
    $date=$_POST['dat'];
		$status=$_POST['status'];

		mysql_query("update product set Product_Name='$prodname',Product_Description='$proddes',Product_Category='$prodcat',Product_Price='$prodpri',Product_Rent_Price='$prodRpri',Product_Stock='$stk',Product_Date='$date',Product_Status='$status' where Product_ID='$product_id'");
	?>
	<script>
		alert("One record saved");
	</script>

	<?php
		header("Location:admin_prodList.php");
	}
?>
