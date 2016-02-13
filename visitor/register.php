<html>

<?php
	 include("../dataconn/dataconn.php");
	 //hi
$reg_error_email = "reg_normal";
$reg_error_pass = "reg_normal";

		if(isset($_POST["createaccbtn"]))
		{

			$email=$_POST["email"];
			$unique_salt = hash('md5', microtime());
			//$pass=hash('md5', $_POST['password'].'raNdoMStAticSaltHere'.$unique_salt);
			//$repass=hash('md5', $_POST['repassword'].'raNdoMStAticSaltHere'.$unique_salt);
			$pass = md5($_POST["password"]);
			$repass = md5($_POST["repassword"]);

			$phone=$_POST["phone"];
			$bday=$_POST["bday"];
			$address=$_POST["address"];
			$name=$_POST["text"];

			$emailresult=mysql_query("select * from user where User_Email='$email'");

			if(mysql_num_rows($emailresult)!=0)
		{
				$reg_error_email = "reg_error";

		}
			else if($pass!=$repass)
				{

						$reg_error_pass = "reg_error";


				}

		else
		{
			mysql_query("insert into user(User_Name,User_Password,User_Email,User_Phone,User_Address,User_Dob,User_Subscribe_Status,User_Privilege)values('$name','$pass','$email','$phone','$address','$bday','Enable','2')");

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
	<title>Register</title>
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
				<input type="text" name="email" value="" id="" placeholder="Your Email..." class="input_box email" required pattern="[a-z0-9._%+-]+@[a-z0-9]+.com"/>
				<span id="" class="<?php echo $reg_error_email;?>">Your email is exist. Please change other email.
				</span>
				<input type="text" name="text" value="" id="" placeholder="Your Nickname..." class="input_box nickname" required/>
				<span id="" class="<?php echo $reg_error;?>">
				</span>
				<input type="password" name="password" value=""  id="" placeholder="Your Password..." class="input_box password" required/>
				<span id="" class="<?php echo $reg_error;?>">
				</span>
				<input type="password" name="repassword" value=""  id="" placeholder="Retype Password..." class="input_box password" required/>
				<span id="" class="<?php echo $reg_error_pass;?>">Your Password was not same with Retype Password.
				</span>
				<input type="text" name="phone" maxlength="11" value=""  id="" placeholder="Your Phone Number..." class="input_box phone" required />
				<span id="" class="<?php echo $reg_error;?>">
				</span>
				<input type="date" name="bday" value=""  id=""  placeholder="Your Birthday..." class="input_box bday"  required />
				<span id="" class="<?php echo $reg_error;?>">
				</span>
				<input type="text" name="address" value=""  id="" placeholder="Your Address..." class="input_box address" required/>
				<span id="" class="r<?php echo $reg_error;?>">
				</span>
				<input type="submit" value="REGISTER" id="" class="btn press_reg" name="createaccbtn"/>
			</form>
			<div class=""></div>
		</div>

	</div>

</body>
</html>
