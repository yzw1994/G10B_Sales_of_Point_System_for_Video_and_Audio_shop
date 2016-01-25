<?php
	include("../dataconn/dataconn.php");
?>
<?php
	if(isset($_POST['loginbtn']))
	{
	$user_email = $_POST["email"];
	$user_password = $_POST["password"];

	$result = mysql_query("select * from user where user_email = '$user_email' and user_password = '$user_password'");
	if(mysql_num_rows($result)!=0)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["user_id"] = $row["User_ID"];

		header("Location: ../user/index.php");
	}
	else
	{
		?>
		<script>
			alert("Invalid Username or Password");
		</script>
		<?php
	}

	mysql_close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link href="../css/login_page.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
</head>
<body>
	<div id="" class="login_div">
		<div id="" class="logo_div">
			<a href="visitor.php"><img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/></a>
		</div>
		<div id="" class="input_div">
			<form name="login" method="post" action="">
				<span>whatever slogan here...</span>
				<input type="text" name="email" value="" id="" placeholder="Your Email..." class="input_box email"/>
				<input type="password" name="password" value=""  id="" placeholder="Your Password..." class="input_box password"/>
				<div id="" class="login_error">
					<span id="" class="error_message">Invalid Email or Password.
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
