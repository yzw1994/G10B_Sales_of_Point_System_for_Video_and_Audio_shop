<?php
	$logoutAction = $_SERVER['PHP_SELF']."?logout=true";
	if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	$logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
	}


	if ((isset($_GET['logout'])) &&($_GET['logout']=="true")){
  $_SESSION['user_id'] = NULL;
  unset($_SESSION['user_id']);

  $logoutLocation = "../visitor/visitor.php";
  if ($logoutLocation) {
		session_start();
		session_destroy();
    header("Location: $logoutLocation");
    exit;
  }
}
?>
