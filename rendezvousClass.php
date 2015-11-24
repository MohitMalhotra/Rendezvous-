<?php
require_once 'connection.php';

class Rendezvous {
	private $addStatement;
	
	public function __construct () {
        $this->dbConnection = new DatabaseConnection();	
	}
	
	public function checkUsername($username) {
		return $this->dbConnection->send_sql("SELECT * FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getPassword($username) {
		return $this->dbConnection->send_sql("SELECT password FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getQuestion1($username) {
		return $this->dbConnection->send_sql("SELECT securityQuestion1 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getQuestion2($username) {
		return $this->dbConnection->send_sql("SELECT securityQuestion2 FROM user WHERE email = '$username'")->fetch_all(MYSQLI_ASSOC);
	}
	
	function __destruct () {
        if ($this->addStatement) {
            $this->addStatement->close();
        }
    }
}
?>