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
<form method="POST" action="" name="securityQuestionForm">
<div class = "input-group">
	<p>Security Question 1:<input type="text" id="question1" style="width: 300px;" name="question1" value="<?php echo $question1; ?>" readonly />
</div>
	<p>Answer:<input type="text" name="answer1" id="answer1" ></p>
<div class="input-group">
	<p>Security Question 2:<input type="text" id="question2" style="width: 300px;" name="quesion2" value="<?php echo $question2; ?>" readonly />
</div>
	<p>Answer:<input type="text" name="answer2" id="answer2"></p>
	<p class="submit"><input type="submit" id="submit" name="submit" value="Submit"></p>
</form>

<?php 
if(isset($_POST['submit'])) {
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	
	foreach($data->getAnswer1($username) as $getAnswer1) {
		$getAnswer1 = implode($getAnswer1);
	}
	foreach($data->getAnswer2($username) as $getAnswer2) {
		$getAnswer2 = implode($getAnswer2);
	}
	
	if($answer1=="" || $answer2=="")
		echo "Answers should not be empty";
	
	else if($getAnswer1 == $answer1 && $getAnswer2 == $answer2) {
		header("Location:changepassword.php");
	}
	
	else {
		echo "Security answers doesn't match";
	}
}
?>

</body>
</html>