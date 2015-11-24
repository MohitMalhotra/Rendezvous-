<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>User Sign Up</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post" action="" name="Form">
<p>Username:<input type="email" name="email" autocomplete="off" value="" ></p>
<p class="submit"><input type="submit" id="continue" name="continue" value="Continue"></p>
      </form>
<?php
session_start();
require_once 'rendezvousClass.php';
$data = new Rendezvous();
if(isset($_POST['continue'])) {
	if($_POST['email']=="") {
		echo "Username is required!";
	}
	else if($data->checkUsername($_POST['email']) != null) {
			$_SESSION['username'] = $_POST['email'];
			header("Location:securityQuestions.php");
	}
	else {
		echo "Username doesn't exist!";
		echo "<br /><br /><a href='signup.php'>Click here to Sign Up!</a>";	
	}	
}
?>
	  </body>
	  </html>