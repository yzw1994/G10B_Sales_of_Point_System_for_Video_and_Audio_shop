<?php
	require("../dataconn/dataconn.php");

	$reg_error_login="reg_normal";


	if(isset($_POST['loginbtn'])){

		$email=$_POST['email'];
		$password = md5($_POST['password']);
		$login_sql = "select * from user where user_email = '".$email."' and user_password = '".$password."'";
		$login_result = mysql_query($login_sql);

		$login_check = mysql_num_rows($login_result);

		if($login_check==1){
			$row = mysql_fetch_assoc($login_result);
			session_start();
			$_SESSION['user_id'] = $row["User_ID"];
			header("Location: ../user/index.php");
		}
		else {
				$reg_error_login= "reg_error";
		}

	}
?>

<html>
<head>
	<title>Log In</title>
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
				<span>whatever slogan here...</span>
				<input type="text" name="email" value="" id="" placeholder="Your Email..." class="input_box email" pattern="[a-z0-9._%+-]+@[a-z0-9]+.com"/>
				<input type="password" name="password" value=""  id="" placeholder="Your Password..." class="input_box password"/>
				<div class="forget_password">
				<a href="forgetpassword.php" class="forget_password_text">Forget Password</a>
				</div>
				<div id="" class="login_error">
					<span id="" class="<?php echo $reg_error_login;?>">Invalid Email or Password.
					</span>
				</div>
				<a href="register.php"><input type="button" value="REGISTER" id="" class="btn register_btn"/></a>
				<input type="submit" value="LOGIN" id="" name="loginbtn" class="btn login_btn"/>
			</form>
			<div class=""></div>
		</div>
	</div>
</body>
</html>
