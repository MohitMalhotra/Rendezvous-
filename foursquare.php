<?php
 $client_ID = "K5DRB5U12ZDL34XSLS3C4IZB3YMJRIKCRLDJ3WCV4KXIAW4N";
$client_secret = "I14SEXDCR23VH4IQSSMJ5MPDXIDUM0U4JCMG4FTLJGUNRK0R";
$oauth_token = "34BKKF5OYKVTDBGZEWADDVHZB1NJQHZ2AEIOSOD0LRQ3T3KL";
$version = "20151125";
require_once 'connection.php';
require_once 'rendezvousClass.php';
$data = new Rendezvous();

error_reporting ( E_ERROR | E_PARSE ); 
class Foursquare {
	

	// search by name and city
	public function NameCity($name,$city) {
		$city = "chicago";
		$name = "chipo";
		$resp_oauthtoken = file_get_contents ( 'https://api.foursquare.com/v2/venues/explore?near=' . $city . '&query=' . $name . '&oauth_token=' . $oauth_token . '&v=' . $version );
		$obj = json_decode ( $resp_oauthtoken, true );
		
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				echo "<br/>";
				echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
				echo "<br/>";
				echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'];
			}
		} else
			echo "Please check the credential again !!";
	}
	
	// Search by Zipcode + radius + rating
	public function ZipRadiusRating() {
		$zipcode = '07307';
		$radius = 1 * 1609.34;
		$rating = "8";
		
		$resp_latlnggoogle = file_get_contents ( 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $zipcode . '&key=AIzaSyCqt0V2s8VlZHYEjC2k1k_rWhcSDVFxwfg' );
		$objlatlng = json_decode ( $resp_latlnggoogle, true );
		if ($objlatlng ['status'] == "OK") {
			$lat = $objlatlng ['results'] ['0'] ['geometry'] ['location'] ['lat'];
			$lng = $objlatlng ['results'] ['0'] ['geometry'] ['location'] ['lng'];
			
			$resp_oauthtoken = file_get_contents ( 'https://api.foursquare.com/v2/venues/explore?ll=' . $lat . ',' . $lng . '&radius=' . $radius . '&oauth_token=' . $oauth_token . '&v=' . $version );
			$obj = json_decode ( $resp_oauthtoken, true );
			
			if (floatval ( $obj ['meta'] ['code'] ) == 200) {
				for($i = 0; $i < 30; $i ++) {
					if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
						echo "<br/>";
						echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
						echo "<br/>";
						echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'];
					}
				}
			} else
				echo "Please check the credential again !!";
		} else
			echo "Please check the zipcode again !!";
	}
	// Advance search -- search by name + city + radius + rating
	public function NameCityRadiusRating($name,$city,$radius,$rating) {
		
		$radius_new = $radius * 1609.34;
		
		$result = array();
		$url = "https://api.foursquare.com/v2/venues/explore?query=$name&radius=$radius_new&near=$city&oauth_token=34BKKF5OYKVTDBGZEWADDVHZB1NJQHZ2AEIOSOD0LRQ3T3KL&v=20151125&sortByDistance=1";
		$resp_oauthtoken = file_get_contents ($url);
		$obj = json_decode ( $resp_oauthtoken, true );
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					//array_push($resultnamecityrr,$obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['id']);
					$id = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['id'];
					$name = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
					$address = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['location']['address'];
					$lat = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['location']['lat'];
					$lng = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['location']['lng'];
					$city = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['location']['city'];
					$state = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['location']['state'];
					$phone = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['contact']['formattedPhone'];
					$rating =  $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'];
					$url =  $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['url'];
					$resultnamecityrr = array (
							"id" => $id,
							"name" => $name,
							"address" => $address,
							"lat" => $lat,
							"lng" => $lng,
							"city" => $city,
							"state" => $state,
							"phone" => $phone,
							"rating" => $rating,
							"url"=>$url
					);
					array_push($result,$resultnamecityrr);
				}
				
			}
			
			$data->insertVenue($result);
			//echo $data;
			return  $data;
		} else
			//return $url;
			return "Please check the credential again !!";
	}
	// search by city + radius + rating
	public function CityRadiusRating() {
		$city = "chicago";
		$radius = 1 * 1609.34;
		$rating = "8";
		$resp_oauthtoken = file_get_contents ( 'https://api.foursquare.com/v2/venues/explore?near=' . $city . '&radius=' . $radius . '&oauth_token=' . $oauth_token . '&v=' . $version );
		$obj = json_decode ( $resp_oauthtoken, true );
		
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
					echo "<br/>";
					echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'];
					echo "<br/>";
				}
			}
		} else
			echo "Please check the credential again !!";
	}
	public function ZipNameRadiusRating($name,$zipcode,$radius,$rating) {
		// Search by Zipcode and Name + Radius + Rating

		$radius_new = $radius * 1609.34;
		
		$resultnameziprr = array();
		$url_google = "https://maps.googleapis.com/maps/api/geocode/json?address=$zipcode&query=$name&key=AIzaSyCqt0V2s8VlZHYEjC2k1k_rWhcSDVFxwfg";
		$resp_latlnggoogle = file_get_contents ( $url_google );
		$objlatlng = json_decode ( $resp_latlnggoogle, true );
		$lat = $objlatlng ['results'] ['0'] ['geometry'] ['location'] ['lat'];
		$lng = $objlatlng ['results'] ['0'] ['geometry'] ['location'] ['lng'];
		$url_fsq = "https://api.foursquare.com/v2/venues/explore?ll=$lat,$lng&radius=$radius_new&oauth_token=34BKKF5OYKVTDBGZEWADDVHZB1NJQHZ2AEIOSOD0LRQ3T3KL&v=20151125&sortByDistance=1";
		$resp_oauthtoken = file_get_contents ($url_fsq);
		$obj = json_decode ( $resp_oauthtoken, true );
		
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					array_push($resultnameziprr,$obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name']);
					
				}
			}
			if(sizeOf($resultnameziprr) > 1)
			{
				return $resultnameziprr;}
			else
			{
				echo $obj ['response']['warning']['text'];}
			
		} else
			echo "Please check the credential again !!";
	}
	
	// Search by Latitude and Longitude + radius + rating
	public function latLongRadiusRating() {
		$lat = "";
		$lng = "";
		$radius = "";
		$rating = "";
		$resp_oauthtoken = file_get_contents ( 'https://api.foursquare.com/v2/venues/explore?ll=' . $lat . ',' . $lng . '&radius=' . $radius . '&oauth_token=' . $oauth_token . '&v=' . $version );
		$obj = json_decode ( $resp_oauthtoken, true );
		
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
					echo "<br/>";
					echo $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'];
				}
			}
		} 

		else
			echo "Please check the credential again !!";
	}
	// Search by lat and name + radius + rating
	public function LatLongNameRadiusRating($lat,$long,$name,$radius,$rating) {
		$radius_new = $radius * 1609.34;
		
		$resultllnamerr = array();
		$url = "https://api.foursquare.com/v2/venues/explore?ll=$lat,$long&query=$name&radius=$radius_new&oauth_token=34BKKF5OYKVTDBGZEWADDVHZB1NJQHZ2AEIOSOD0LRQ3T3KL&v=20151125&sortByDistance=1";
		$resp_oauthtoken = file_get_contents ($url);
		$obj = json_decode ( $resp_oauthtoken, true );
		
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					array_push($resultllnamerr,$obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name']);
					
				}
			}
		if(sizeOf($resultllnamerr) > 1)
		{	return $resultllnamerr;}
		else 
		{
			echo $obj ['response']['warning']['text'];} //error display
		
		} else
			//echo $url;
			echo "Please check the credential again !!";
	}
	
	
	// City + Lat + Lng + Rad + Rating
	public function CityLatLngRadiusRating($lat,$long,$city,$radius,$rating) {
	
		$radius_new = $radius * 1609.34;
	
		$resultllcityrr = array();
		$url = "https://api.foursquare.com/v2/venues/explore?ll=$lat,$long&radius=$radius_new&near=$city&oauth_token=34BKKF5OYKVTDBGZEWADDVHZB1NJQHZ2AEIOSOD0LRQ3T3KL&v=20151125&sortByDistance=1";
		$resp_oauthtoken = file_get_contents ($url);
		$obj = json_decode ( $resp_oauthtoken, true );
		if (floatval ( $obj ['meta'] ['code'] ) == 200) {
			for($i = 0; $i < 30; $i ++) {
				if (floatval ( $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['rating'] ) >= floatval ( $rating )) {
					array_push($resultllcityrr,$obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name']);
					//$name = 	$obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['name'];
					//$id = $obj ['response'] ['groups'] ['0'] ['items'] [$i] ['venue'] ['id'];
					//array_push all info in single array
				}
			}
			if(sizeOf($resultllcityrr) > 1)
			{				
				return $resultllcityrr; //call database function and send arrayname 
			}
			else
			{
				echo $obj ['response']['warning']['text'];} //error display
			
		} else
			//return $url;
			return "Please check the credential again !!";
	}
	
}
// 1 mile = 1609.34 meters
?>