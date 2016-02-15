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
  $product_id = (int)$_GET['pid'];
  $result1 = mysql_query("SELECT * FROM product where Product_ID=$product_id");
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

.textfield{
  width:250px;
}

</style>
</head>


<body>
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


		header("Location:admin_prodList.php");
	}
?>
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
        <div class="h_title">Product List</div>
        <form name="editfrm" method="post" action=""  ENCTYPE=multipart/form-data>
          <table>
          <tr><td>Name : </td><td><input type="text" name="pname" class="textfield" value="<?php echo $row1['Product_Name'];?> "/></td></tr>
  				<tr><td>Description : </td><td><textarea rows="3"cols="34" name="des" class=""><?php echo $row1['Product_Description'];?></textarea></td></tr>
  				<tr><td>Category : </td><td><input type="text" name="cat" class="textfield" value="<?php echo $row1['Product_Category'];?>"/></td></tr>
  				<tr><td>Price : </td><td><input type="text" name="pri" class="textfield" value="<?php echo $row1['Product_Price'];?>"/></td></tr>
  				<tr><td>Rent Price : </td><td><input type="text" name="rpri" class="textfield"value=" <?php echo $row1['Product_Rent_Price'];?>"/></td></tr>
  				<tr><td>Stock : </td><td><input type="text" name="stk" class="textfield" value="<?php echo $row1['Product_Stock'];?>"/></td></tr>
          <tr><td>Date : </td><td><input type="date" name="dat" class="textfield" value="<?php echo $row1['Product_Date'];?>"/></td></tr>
  				<tr><td>Status:</td>
  					<td><select name="status">
  						<option value="Active" <?php if ($row1['Product_Status'] == "Active")  echo "selected";  ?>>Active</option>
  						<option value="Unactive" <?php if ($row1['Product_Status'] == "Unactive") echo "selected='selected' "  ?>>Unactive</option>
              <option value="Coming Soon" <?php if ($row1['Product_Status'] == "Coming Soon") echo "selected='selected' "  ?>>Coming Soon</option>
  					</select>
  				</td><tr>
  				<tr><td><input type="submit" name="updatebtn" value="Update Now" /></td><tr>
        </table>
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
