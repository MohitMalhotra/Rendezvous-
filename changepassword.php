<?php 
session_start();
require_once 'rendezvousClass.php';
$data = new Rendezvous();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post" action="" name="Form">
 <p>New Password:<input type="password" name="pass1" id="pass1" ></p>
 <p>Confirm Password:<input type="password" name="pass2" id="pass2"></p>
 <p class="submit"><input type="submit" name="change" value="Change"></p>
 <?php
 if(isset($_POST['change'])) {
	if($_POST['pass1']=="" || $_POST['pass2']=="") {
		echo "Please provide new password in both the fields!";
	}
	else if($_POST['pass1'] == $_POST['pass2']) {
		$pwd = password_hash($_POST['pass1'], PASSWORD_BCRYPT);
		$data->updatePassword($username, $pwd);
		header('Location:homepage.php');
	}
	else {
		echo "Password provided in both the fields are different";
	}
 } 
 ?>
</body>
</html>

 