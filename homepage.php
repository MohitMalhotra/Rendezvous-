<?php
session_start();
require_once 'rendezvousClass.php';
$data = new Rendezvous();
$strPwd=null;
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
	.bs-example{
		margin: 20px;
	}
</style>
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login</h1>
      <div class="form-group">
      <form method="post" action="" name="Form" class="form-horizontal">
        <p> Email* <input type="text" id="username" name="username" value="" placeholder="Email"></p>
        <p> Password* <input type="password" id="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" id="login" name="login" value="Login"></p>
		<p class="submit"><input type="submit" id="withoutid" name="withoutid" value="Continue as Guest"></p>
      </form>
    </div>
	  </div>

    <div class="login-help">
		<p>Not yet registered? <a href="signup.php">Sign Up</a></p>
      <p>Forgot your password? <a href="forgotpassword.php">Click here</a></p>
    </div>
	<?php
	//moving to basic search page for guest user
	if(isset($_POST['withoutid'])) {
		$_SESSION['withoutid'] = $_POST['withoutid'];
		header("Location:basicsearch.php");
	}
	//checking for logged in user
	if(isset($_POST['login'])) {
		$_SESSION['login'] = $_POST['login'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username=="" || $password=="") {
			echo "<br />Provide all the required fields!";
		}
		else if($data->checkUsername($username) != null) {
			foreach($data->getPassword($username) as $pwd) {
				$strPwd = implode($pwd);
			}
			if(password_verify($password, $strPwd)) {
				$_SESSION['username'] = $username;
				header("Location:basicsearch.php");
			}
			else
				echo "<br />Password doesn't match!";
		}
		else
			echo "<br />Username doesn't exist!";
	}
	
	?>
  </section>

</body>
</html>