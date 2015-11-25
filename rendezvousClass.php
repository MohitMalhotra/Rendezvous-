<?php
require_once 'connection.php';

class Rendezvous {
	private $addStatement;
	
	public function __construct () {
        $this->dbConnection = new DatabaseConnection();	
	}
	
	// Function to check username in database
	public function checkUsername($username) {
		return $this->dbConnection->send_sql("SELECT * FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to fetch password
	public function getPassword($username) {
		return $this->dbConnection->send_sql("SELECT password FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to get security question 1 from User table
	public function getQuestion1($username) {
		return $this->dbConnection->send_sql("SELECT securityQuestion1 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to get security question 2 from User table
	public function getQuestion2($username) {
		return $this->dbConnection->send_sql("SELECT securityQuestion2 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to get security answer 1 from User table
	public function getAnswer1($username) {
		return $this->dbConnection->send_sql("SELECT answerQuestion1 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to get security answer 2 from User table
	public function getAnswer2($username) {
		return $this->dbConnection->send_sql("SELECT answerQuestion2 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function to update password
	public function updatePassword($username, $password) {
		$this->addStatement = $this->dbConnection->prepare_statement("UPDATE user SET password='$password' WHERE email='$username'");
		$this->addStatement->execute();
	}
	
	function __destruct () {
        if ($this->addStatement) {
            $this->addStatement->close();
        }
    }
}
?>