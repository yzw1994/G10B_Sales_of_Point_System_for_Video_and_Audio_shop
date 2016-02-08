<?php require('../application/application_top.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin > Personal Details</title>
			<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="../css/bg_style_black.css" media="screen" />
			<link rel="shortcut icon" href="../images/mmu_icon.png" type="image/png">
			<script type="text/javascript" src="../javascript/timer.js"></script>
			<style type="text/css">
				table
				{
					width: 50%;
					margin-left: 180px;
				}
			</style>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<img src="../images/logo_bg.png" style="position:absolute; width: 490px; margin: -128px 0 0 -50px;">
				<img src="../images/mmu_logo.png" alt="MMU Logo" style="position:absolute; width: 160px;">
				<img src="../images/title.png" alt="System Title" style="position:absolute; width: 200px; margin-left: 200px;">
			</div>
			<div class="right">
				<div class="align-right">
					<p><span id="timer"></span></p>
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="../index.php">Home</a></li>
				<li class="upp"><a href="#">Booking</a>
					<ul>
						<li><a href="">New Booking</a></li>
						<li><a href="">Booking History</a></li>
					</ul>
				</li>
				<li class="upp"><a href="#">Timetable</a></li>
			</ul>
		</div>
	</div>

	<div id="content">
    	<!-- Sidebar -->
		<?php require('sidebar.php') ?>
        <!-- Sidebar_eof -->

		<div id="main">
			<div class="full_w">
				<div class="h_title">Admin > Staff > Personal Details</div>
				<form>
				<div style="float:left;">
					<?php echo "<img src='".$row['image']."' style='border:1px solid black' padding='5px' height='150px' width='150px'/>";?>
				</div>
				<div>
					<table>
                    <?php
						$result = mysql_query("select * from user inner join position where uid  = '$sess_mid' and user.position_id =position.position_id");
						$row = mysql_fetch_array($result);
					?>
						<tr>
							<td colspan="2" style="font-size: 18pt; font-weight:bold;"><?php echo $row["name"] ?>'s Profile</td>
						</tr>
						<tr>
							<td><b>Staff ID</b></td>
							<td><?php echo $row["uid"] ?></td>
						</tr>
						<tr>
							<td><b>Email</b> </td>
							<td><?php echo $row["email"] ?></td>
						</tr>
						<tr>
							<td><b>Contact No.</b></td>
							<td><?php echo $row["contact_no"] ?></td>
						</tr>
						<tr>
							<td><b>Username</b></td>
							<td><?php echo $row["username"] ?></td>
						</tr>
						<tr>
							<td><b>Password</b></td>
							<td><?php echo $row["password"] ?></td>
						</tr>
						<tr>
							<td><b>Position</b></td>
							<td><?php echo $row["position_desc"] ?></td>
						</tr>
					</table>
					<div style="margin-left: 180px;">
						<button class="edit" type="button" onclick="location.href='admin_updateprofile.php';" style="background: #F3F3F3 url(../images/i_edit.png) no-repeat 4px center; padding-left: 25px;">Edit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- body_eof //-->

	<!-- footer //-->
  	<?php require('../includes/footer.php'); ?>
  	<!-- footer_eof //-->
</div>

</body>
</html>
