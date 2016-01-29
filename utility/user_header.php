<?php
  include("../dataconn/dataconn.php");
	if(!isset($_SESSION))
	{
		session_start();
	}

	$user_id = $_SESSION['user_id'];
	$result = mysql_query("SELECT * FROM user WHERE User_ID = '$user_id'");
	$row = mysql_fetch_assoc($result);
  require("logout.php");
?>

<div id="" class="logo_div section group">
		<div id="" class="col span_1_of_3">
		<a href="../user/index.php" id="" class="logo_link" id="">
			<img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/>
			<p id="" class="shop_name">Blu Video And Audio Shop</p>
		</a>
		</div>
		<div id="" class="search_div col span_1_of_3">
			<p><input type="text" name="search" id="" class="search_bar" placeholder="Search..."/></p>
		</div>
		<div id="" class="col span_1_of_3 btn_group after_login">
			<a href="../user/add_to_cart.php" id="" class="user_btn cart_btn"/>
				<img src="../images/cartblack.png" title="add to cart" id="" class=""/>
			</a>
			<a href="../user/user_profile.php" id="" class="user_btn profile_btn"/>
				<img src="<?php echo $row["User_Profile_Pic"]; ?>" title="profile" id="" class=""/>
			</a>
			<div id="menu_function" class="user_btn menu_btn"/>
				<img src="../images/menu.png" title="menu" id="" class=""/>
				<div id="menu_content_function" class="menu_content">
          <a href="../user/change_password.php" id="" class="menu_item"><span>Change Password</span></a>
					<a href="" id="" class="menu_item"><span>Setting</span></a>
					<a href="<?php echo $logoutAction ;?>" id="" class="menu_item logout"><span>Log Out</span></a>
				</div>
			</div>
		</div>

	</div>
