<?php
	include("dataconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>

<body>
	<form name="loginfrm" action="" method="post">
		<p>Username : 
			<input type="text" name="uname" size = "20" />
		</p>
	
		<p>Password : 
			<input type="password" name="upass" size = "20" />
		</p>
	
		<p>
			<input type="submit" name="loginbtn" value="Login" />
		</p>
	</form>

</body>
</html>

<?php
	if(isset($_POST['loginbtn']))
	{
	$username = $_POST["uname"];
	$userpass = $_POST["upass"];
	
	$result = mysql_query("select * from admin where AD_USER = '$username' and AD_PASS = '$userpass'");
	if(mysql_num_rows($result)!=0)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["aid"] = $row["AD_ID"];
		
		header("Location: admin_dashboard.php");
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
