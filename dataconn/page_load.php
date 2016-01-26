
<?php
if (!$_SESSION['user_id']) {
  echo "You are not logged in.";
  $logoutLocation = "../visitor/visitor.php";
  header("Location: $logoutLocation");
  exit();
}
?>
