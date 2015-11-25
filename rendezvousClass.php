<?php
require_once 'connection.php';

class Rendezvous {
	private $addStatement;
	
	public function __construct () {
        $this->dbConnection = new DatabaseConnection();	
	}
	# Meet halway returning Midpoint latitude and longitude
	# Ambika Maheshwari
	public function meetHalwayCalculation($latitude1,$longitude1,$latitude2,$longitude2)
	{
		$latitude1= deg2rad($latitude1);
		$longitude1= deg2rad($longitude1);
		$latitude2= deg2rad($latitude2);
		$longitude2= deg2rad($longitude2);
	
		$dlng = $longitude2 - $longitude1;
		$Bx = cos($latitude2) * cos($dlng);
		$By = cos($latitude2) * sin($dlng);
		$latitude3 = atan2( sin($latitude1)+sin($latitude2),
				sqrt((cos($latitude1)+$Bx)*(cos($latitude1)+$Bx) + $By*$By ));
		$longitude3 = $longitude1 + atan2($By, (cos($latitude1) + $Bx));
		$pi = pi();
		$latitude3 = round(($latitude3*180/$pi),4);
		$longitude3 = round(($latitude3*180/$pi),4);
	
		return  $latitude3.' '.$longitude3 ;
	
	}
	
	//Haversine formual
	public function haversineFormula($latitude1,$longitude1,$latitude2,$longitude2)
	{
		//Latitude and longitude 1 will be user's
		//latitude and longitude 2 will be from database
	
		$latitude1= deg2rad($latitude1);
		$longitude1= deg2rad($longitude1);
		$latitude2= deg2rad($latitude2);
		$longitude2= deg2rad($longitude2);
		$radiusOfEarth = 6371000;// Earth's radius in meters.
	
		$diffLatitude = $latitude2 - $latitude1;
		$diffLongitude = $longitude2 - $longitude1;
	
		$a = sin($diffLatitude / 2) * sin($diffLatitude / 2) +
		cos($latitude1) * cos($latitude2) *
		sin($diffLongitude / 2) * sin($diffLongitude / 2);
		$c = 2 * asin(sqrt($a));
		$distance = $radiusOfEarth * $c;
		return $distance;
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