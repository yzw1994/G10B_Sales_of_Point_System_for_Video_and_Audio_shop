<html>

<?php
	 include("../dataconn/dataconn.php");


		if(isset($_POST["createaccbtn"]))
		{

			$email=$_POST["email"];
			$pass=$_POST["password"];
			$repass=$_POST["repassword"];
			$phone=$_POST["phone"];
			$bday=$_POST["bday"];
			$address=$_POST["address"];
			$name=$_POST["text"];

			$emailresult=mysql_query("select * from user where User_Email='$email'");

			if(mysql_num_rows($emailresult)!=0)
		{
			?>
			<script type="text/javascript">
				alert("Your email is exist. Please change other email.");
			</script>
			<?php
		}
		else
		{
			mysql_query("insert into user(User_Name,User_Password,User_Email,User_Phone,User_Address,User_Dob,User_Subscribe_Status,User_Privilege)values('$name','$pass','$email','$phone','$address','$bday','1','2')");
			?>
			<script type="text/javascript">
				alert("Your register is successful.");
				window.location.href='visitor.php';
			</script>

			<?php


		}




		}




?>


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
				<input type="text" name="email" value="" id="" placeholder="Your Email..." class="input_box email"/>
				<span id="" class="reg_error">
				</span>
				<input type="text" name="text" value="" id="" placeholder="Your Nickname..." class="input_box nickname"/>
				<span id="" class="reg_error">
				</span>
				<input type="password" name="password" value=""  id="" placeholder="Your Password..." class="input_box password"/>
				<span id="" class="reg_error">
				</span>
				<input type="password" name="repassword" value=""  id="" placeholder="Retype Password..." class="input_box password"/>
				<span id="" class="reg_error">
				</span>
				<input type="number" name="phone" value=""  id="" placeholder="Your Phone Number..." class="input_box phone"/>
				<span id="" class="reg_error">
				</span>
				<input type="date" name="bday" value=""  id="" placeholder="Your Birthday..." class="input_box bday"/>
				<span id="" class="reg_error">
				</span>
				<input type="text" name="address" value=""  id="" placeholder="Your Address..." class="input_box address"/>
				<span id="" class="reg_error">
				</span>
				<input type="submit" value="REGISTER" id="" class="btn press_reg" name="createaccbtn"/>
			</form>
			<div class=""></div>
		</div>

	</div>

</body>
</html>
