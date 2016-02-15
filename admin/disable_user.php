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
  $user_list = mysql_query("SELECT * FROM user where User_Privilege='2'");
  $user_rows = mysql_num_rows($user_list);
  $button = "Disable";




  if(isset($_POST['disable']))
  {


      $u_id = $_POST['userid'];

      $status = mysql_query("UPDATE user set User_Subscribe_Status= '$button' where User_ID=$u_id");



      header("Location: ../admin/disable_user.php");

  }








?>
<!DOCTYPE html>
<html>
<head>
<title>Admin > Index</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/bg_style_black.css" media="screen" />
<script type="text/javascript" src="../Js/jquery-2.2.0.js"></script>
<!--<link rel="shortcut icon" href="../img/mmu_icon.png" type="image/png">-->
<script type="text/javascript" src="../Js/timer.js"></script>
<style type="text/css">
table
{
	width: 800px;
	margin-left: 10px;
}
</style>
</head>
<script>

  function update_status()
  {
    /*
    $.ajax({
      type: "POST",
      url:"disable.php",
      data:{name:$("").val()},
      success:function( msg ){
        alert("Data Saved:" + msg);
      }
    });*/

  }

	function adminedit()
	{
		document.getElementById('edit_Email').contentEditable= true;
		document.getElementById('edit_Contact').contentEditable= true;
		document.getElementById('edit_Name').contentEditable= true;
	}
	function saveUpdate(str) {
		var id = $('#edit_ID').html();
		var email = $('#edit_Email').html();
		var contact = $('#edit_Contact').html();
		var username = $('#edit_Name').html();

		console.log("ID : " + id + ", email : " + email + ", contact : " + contact + ", username : " + username);

		$.ajax({
			type: "POST",
			url: "updateProfile.php",
			dataType: "json",
			data: {
				userid: id,
				email: email,
				contact: contact,
				username: username
			},
			success: function(data) {
				alert("update successful");
			},
      error: function (jqXHR, status, err) {
        alert("update failed");
     }

		});
	}

	function init() {
		$('.profile-details').on('click', function() {
			adminedit();
		});
	}

	$(document).ready(function(){
		init();
	});
</script>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<!--<img src="../img/logo_bg.png" style="position:absolute; width: 490px; margin: -128px 0 0 -50px;">-->
				<!--<img src="../img/mmu_logo.png" alt="MMU Logo" style="position:absolute; width: 160px;">-->
				<!--<img src="../img/title.png" alt="System Title" style="position:absolute; width: 200px; margin-left: 200px;">-->
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
        <div class="h_title">User List</div>
        <table width="90%">
          <thead>
            <tr>
                  <th scope="col" width="20%">User ID</th>
                  <th scope="col" width="20%">User Email</th>
                  <th scope="col" >User Name</th>
                  <th scope="col" >User Phone</th>
                  <th scope="col" >User Address</th>
                  <th scope="col" >User birthday</th>
                  <th scope="col" >User Rent Limit</th>
                  <th scope="col">User Subscirbe status</th>
                  <th scope="col">Disable Button</th>
              </tr>

          </thead>
          <tbody>
            <?php

            while(  $u_rows = mysql_fetch_assoc($user_list))
            {
          ?>
          <form name="user_form" method="POST" style="margin: 0px;">

            <tr>

                  <td class="align-center"><input type="hidden"  name ="userid" value="<?php echo $u_rows['User_ID']?>"><?php echo $u_rows['User_ID']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Email']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Name']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Phone']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Address']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Dob']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Rent_Limit']?></td>
                  <td class="align-center"><?php echo $u_rows['User_Subscribe_Status']?></td>
                  <td>
                      <input type="submit" Value="<?php echo $button ?> " name="disable">
                  </td>
              </tr>
              </form>
            <?php
          }
             ?>
          </tbody>
        </table>

      </div>
    </div>
	</div>
	<div id="footer">
			<p style="text-align:center;">Copyright 2016</p>
	</div>
</div>
</body>
</html>
