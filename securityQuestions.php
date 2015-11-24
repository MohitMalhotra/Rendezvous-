<?php
session_start();
require_once 'rendezvousClass.php';
$data = new Rendezvous();
$username = $_SESSION['username'];
$question1 = null;
$question2 = null;
foreach($data->getQuestion1($username) as $question1) {
	$question1 = implode($question1);
}
foreach($data->getQuestion2($username) as $question2) {
	$question2 = implode($question2);
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Security questions </title>
</head>
<body>
<form method="POST" action="changepassword.php" name="securityQuestionForm">
<div class = "input-group">
	<p>Security Question 1:<input type="text" id="question1" name="question1" value="<?php echo $question1; ?>" readonly />
</div>
	<p>Answer:<input type="text" name="answer1" value="" ></p>
<div class="input-group">
	<p>Security Question 2:<input type="text" id="question2" name="quesion2" value="<?php echo $question2; ?>" readonly />
</div>
	<p>Answer:<input type="text" name="answer2" value=""></p>
	<p class="submit"><input type="submit" id="submit" name="submit" value="Submit"></p>
</form>
</body>
</html>