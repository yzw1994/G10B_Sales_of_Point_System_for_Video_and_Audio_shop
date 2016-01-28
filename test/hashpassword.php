<?php include("dataconn.php");?>
<html>
<form name="test" method="POST" action="">
<p>username: <input type="text" name="username" /></p>
<p>password: <input type="text" name="password" /></p>
<input type="submit" name="btn" value="add">
</form>
</html>
<?php
if(isset($_POST["btn"]))
{
	
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$password= sha1($password);


   mysql_query("insert into user(username,password)values
		('$username','$password')");


	

}
?>
