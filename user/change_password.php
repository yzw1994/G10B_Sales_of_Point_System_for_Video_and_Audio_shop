<!DOCTYPE html>
<html>
<?php
		require("../dataconn/dataconn.php");
			$reg_error_login="reg_normal";

		if(!isset($_SESSION))
		{
			session_start();

		}


		$user_id = $_SESSION['user_id'];

		require("../dataconn/page_load.php");
			$status_password="";




if(isset($_POST['sendbtn'])){



		$old_ps=$_POST["old_pass"];
		$new_ps=$_POST["new_pass"];
		$c_new_ps=$_POST["com_new_pass"];

		$login_sql = "select User_Password from User where User_ID ='".$user_id."' and User_Password = '".$old_ps."'";
		$login_result = mysql_query($login_sql);
		$login_check = mysql_num_rows($login_result);


	if($login_check==0)
	{
			$status_password="Please enter correct password!!";
			$reg_error_login= "reg_error";
	}
	else if($new_ps!=$c_new_ps){


		$status_password="Your new password not same with comfirm password!!";
		$reg_error_login= "reg_error";
	}
	else if($login_check!=0)
	{

			$change=mysql_query("update User set User_Password='".$c_new_ps."' where  User_ID = '".$user_id."'");

			if($change)
				{
				?>
				<script>
					alert("Password changed success !!!");
					window.location = "../user/index.php";
				</script>
				<?php


				}

			}
}





?>

<html>
<head>
	<title>Change Password</title>
	<link href="../css/login_page.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="../js/jquery-2.2.0.js"></script>
</head>
<body>
	<div id="" class="login_div">
		<div id="" class="logo_div">
			<a href="visitor.php"><img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/></a>
		</div>
		<div id="" class="input_div">
			<form name="login" method="post" action="">
				<span id="change_password">Change Password</span>
				<input type="password" name="old_pass" value="" id="" placeholder="old password..." class="input_box_forget email" required/>
				<input type="password" name="new_pass" value=""  id="" placeholder="new password..." class="input_box_forget password" required/>
				<input type="password" name="com_new_pass" value=""  id="" placeholder="Confirm your new password..." class="input_box_forget password"required/>

				<div id="" class="login_error">
					<span id="" class="<?php echo $reg_error_login;?>"><?php echo $status_password;?>
					</span>
				</div>
								<input type="submit" value="Send" id="" name="sendbtn" class="btn forget_btn"/>
			</form>

		</div>
	</div>
</body>
</html>
