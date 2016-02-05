<!DOCTYPE html>
<html>
<?php
		require("../dataconn/dataconn.php");
		require_once ("Mail.php");
		$reg_error_login="reg_normal";

if(isset($_POST['sendbtn'])){


	$name = $_POST['nickname'];
	$to = $_POST["email"];

	$login_sql = "select * from user where User_Email = '".$to."' and User_Name = '".$name."'";
	$login_result = mysql_query($login_sql);



		if($login_result==null){

					$reg_error_login= "reg_error";
			}
			else {

	$login_check = mysql_num_rows($login_result);
	randomPassword();
	$newpassword = randomPassword();
	$mdpassword = md5($newpassword);

	$cforget=mysql_query("update user set User_Password='$mdpassword' where User_Name='$name' and User_Email='$to'");




	$from = 'yuanyuan0331@live.com';
	$subject = ' Forget Password of Blu Video and Audio User';
	$msg = <<<EMAIL

Dear $name,
We received you request for your login.
For account security, kindly reminder after login please change your password.

The password below is your new password.

		$newpassword


Kind Regards.

By: Blu Video And Audio Shop
EMAIL;

	$headers = array(
						'From' => $from,
						'To' => $to,
						'Subject' => $subject
					);

	$smtp = Mail::factory('smtp', array(
			'host' => 'smtp.live.com',
			'port' => '587',
			'auth' => true,
			'username' => 'yuanyuan0331@live.com', //require
			'password' => 'guan5678910' //require
			));

	$mail = $smtp->send($to, $headers, $msg);

	if (PEAR::isError($mail)) {
			echo('<p>' . $mail->getMessage() . '</p>');
	} else {
			echo("<script>Send Successful!!</script>");
	}

	header("Location:login.php");
		}
	}


?>

<html>
<head>
	<title>Forget Password</title>
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
				<span id="forget_password">Forget Password</span>
				<input type="text" name="email" value="" id="" placeholder="Your Email..." class="input_box_forget email" pattern="[a-z0-9._%+-]+@[a-z0-9]+.com"/>
				<input type="text" name="nickname" value=""  id="" placeholder="Your Nickname..." class="input_box_forget password"/>

				<div id="" class="login_error">
					<span id="" class="<?php echo $reg_error_login;?>">Invalid Email or Nickname.
					</span>
				</div>
								<input type="submit" value="Send" id="" name="sendbtn" class="btn forget_btn"/>
			</form>

		</div>
	</div>
</body>
</html>


<?php

function randomPassword() {
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}




?>
