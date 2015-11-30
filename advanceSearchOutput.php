<?php
session_start ();
require_once 'connection.php';
require_once 'foursquare.php';
$data_foursq = new Foursquare ();
?>
<!DOCTYPE html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCqt0V2s8VlZHYEjC2k1k_rWhcSDVFxwfg">
</script>

<script>

var address1= "152, ethel road, edison, nj 08817, usa";
var address2= "16 Brotherhood St Piscataway Township, New Jersey";
//var address2= "170, ethel road, edison, nj 08817, usa";
var markers = new Array();
var bounds = new google.maps.LatLngBounds();
//console.log("bounds" + bounds);
function initialize()
{

	var myCenter =new google.maps.LatLng(55.508742,-0.120850);
	var myCenter1 ;//=new google.maps.LatLng(55.508742,-0.120850);

	var myCenter2 ;//=new google.maps.LatLng(51.508742,-0.120850);
	
var mapProp = {
  center:myCenter,
  zoom:6,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var geocoder = new google.maps.Geocoder(); 


geocoder.geocode({address:address1}, function (results,status)
  		{ 
		      
	         if (status == google.maps.GeocoderStatus.OK) {
	        	
		        myCenter1 = results[0].geometry.location;
		        createMarker(myCenter1);
	         }
	        else {
		        //No data
	        }
  		});	

geocoder.geocode({address:address2}, function (results,status)
  		{ 
		      
	         if (status == google.maps.GeocoderStatus.OK) {
	        	
		        myCenter2 = results[0].geometry.location;
		        createMarker(myCenter2);
	         }
	        else {
		        //No data
	        }
	         
  		});	


function createMarker(myCenter) {
		//console.log("myCenter " + myCenter);
	   var contentString = "Hello";
	   var marker = new google.maps.Marker({
	     position: myCenter,
	     map: map,
	           });

	   var infowindow = new google.maps.InfoWindow({
		   content:"Hello World!"
		   });
	   
	  google.maps.event.addListener(marker, 'click', function() {
	    infowindow.open(map,marker);
	   });
	  console.log("marker" + bounds);
	  bounds.extend(marker.position);
	  console.log("marker2" + bounds);
	  map.setCenter(bounds.getCenter());
	  map.fitBounds(bounds);
}

function AutoCenter() {
    //  Create a new viewpoint bound
    var bounds = new google.maps.LatLngBounds();
    console.log("marker" + bounds);
    //  Go through each...
    $.each(markers, function (index, marker) {
        
    bounds.extend(marker.position);
    map.setCenter(bounds.getCenter());
    });
    //  Fit these bounds to the map
    map.fitBounds(bounds);
  }

//AutoCenter();

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<meta charset="utf-8">
<title>Rendezvous - Search Output</title>
<link href='http://fonts.googleapis.com/css?family=Arizonia'
	rel='stylesheet' type='text/css'>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
h2 {
	font: 200 100px/1.0 'Arizonia', Helvetica, sans-serif;
	color: #FFFFFF;
	text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.1);
}

body {
	background-image: url("BackgroundCover.jpg");
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

html {
	width: 100%;
	height: 100%;
	margin: 0;
}

.panel-info {
	opacity: 0.95;
	margin-top: 30px;
	width: 1300px;
	margin: 30px auto;
}

#panel-body {
	overflow: hidden;
}

#contents {
	
	width: 750px;
	min-height: 700px;
	margin-left: 475px;
}

#forms {
	
	width: 450px;
	min-height: 700px;
	float: left;
}

#googleMap {

	width: 750px;
	min-height: 400px;
	
}

#output {

	margin-top: 25px;
	width: 750px;
	min-height: 300px;
	overflow-y: scroll;
	max-height: 300px;
	
}


.form-group {
	width: 1000px;
	padding-left: 60px;
}

.form-group label {
	color: #428bca;
	font-weight: bold;
	padding: 4px;
	font-size: 16px;
	font-family: Georgia;
}

h4 {
	font-style: italic;
}

h3 {
color: #428bca;
	
}


input, select {
	font-weight: bold;
}

h1 {
	color: #428bca;
	font-style: italic;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

</style>
</head>
<body>
	<div id="header">
		<h2>&nbsp;Rendezvous...</h2>
		<h4>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			&nbsp; &nbsp; &nbsp; &nbsp; <font color="white"> Meet your people at
				your chosen places</font>
		</h4>
	</div>
	<div class="panel panel-info" id="panel-info">
		<h1 align="center">Search Results</h1>
		<div class="panel-body" id="panel-body">
			<div id="forms">
			
				<div class="form-group" id="content">

				<form method="post" action="" name="Form" class="form-horizontal">
					<div class="col-xs-3">
						<label>Venue Name</label><input type="text" name="name"
							class="form-control"> <label>Near </label><input type="text"
							name="city" class="form-control"> <label>Zip Code</label><input
							type="text" name="zip" class="form-control"> <label>Latitude </label><input
							type="text" name="lat" class="form-control"> <label>Longitude</label>
						<input type="text" name="long" class="form-control"> <label>Radius
						</label>
						
						<select name="radius" class="form-control">
							<option value="1">1 miles</option>
							<option value="2" selected="selected">2 miles</option>
							<option value="5">5 miles</option>
							<option value="10">10 miles</option>
							<option value="20">20 miles</option>
						</select> <label>Ratings</label> <select name="rating"
							class="form-control">
							<option value="0">0 stars</option>
							<option value="1" selected="selected">1 star</option>
							<option value="2">2 stars</option>
							<option value="3">3 stars</option>
							<option value="4">4 stars</option>
							<option value="5">5 stars</option>
							<option value="6">6 stars</option>
							<option value="7">7 stars</option>
							<option value="8">8 stars</option>
							<option value="9">9 stars</option>
							<option value="10">10 stars</option>
						</select><br>
						<br>
						<button type="Submit" name="adv-search"
							class="btn btn-primary btn-lg btn-block">Search</button>
					</div>
				</form>
			
			</div>
			
			</div>
			<div id="contents">

				<div id="googleMap">
				</div>
				
				<div id="output">
					
						<h3> Chipotle Mexican Grill </h3><br>
						        229 Washington St ,
								Hoboken, NJ ,07030 <br>
						(201) 205-1717 - <a href="">  View Website </a> <br>
						<label>Rating</label> 8.4 <br>
						<a ahref="">Show 10 Reviews</a><br>
						
						<hr>
						<h3> Chipotle Mexican Grill </h3><br>
						        229 Washington St ,
								Hoboken, NJ ,07030 <br>
						(201) 205-1717 - <a href="">  View Website </a> <br>
						<label>Rating</label> 8.4 <br>
						<a ahref="">Show 10 Reviews</a><br>
						
						<hr>
						<h3> Chipotle Mexican Grill </h3><br>
						        229 Washington St ,
								Hoboken, NJ ,07030 <br>
						(201) 205-1717 - <a href="">  View Website </a> <br>
						<label>Rating</label> 8.4 <br>
						<a ahref="">Show 10 Reviews</a><br>
						
						<hr>
						<h3> Chipotle Mexican Grill </h3><br>
						        229 Washington St ,
								Hoboken, NJ ,07030 <br>
						(201) 205-1717 - <a href="">  View Website </a> <br>
						<label>Rating</label> 8.4 <br>
						<a ahref="">Show 10 Reviews</a><br>
						<br>
						<hr>
					
				</div>
				

			</div>
		</div>
	</div>
<?php 

if (isset ( $_POST ['adv-search'] )) {

	if (($_POST ['long'] == "") && ($_POST ['lat'] == "") && ($_POST ['zip'] == "")) {
		if (isset ( $_POST ['name'] ) && isset ( $_POST ['city'] )) {
			$name = strip_tags ( trim ( $_POST ['name'] ) );
			$city = strip_tags ( $_POST ['city'] );
			$rating = strip_tags ( $_POST ['rating'] );
			$radius = strip_tags ( $_POST ['radius'] );
				
			$result = $data_foursq->NameCityRadiusRating ( $name, $city, $radius, $rating );
			//instead of print call the database for storing
				
			print_r ( $result );
		}
	} elseif (($_POST ['long'] == "") && ($_POST ['lat'] == "") && ($_POST ['city'] == "")) {
		if (isset ( $_POST ['name'] ) && isset ( $_POST ['zip'] )) {
			$name = strip_tags ( trim ( $_POST ['name'] ) );
			$zip = strip_tags ( $_POST ['zip'] );
			$rating = strip_tags ( $_POST ['rating'] );
			$radius = strip_tags ( $_POST ['radius'] );
				
			$result = $data_foursq->ZipNameRadiusRating ( $name, $zip, $radius, $rating );
			//instead of print call the database for storing
				
			print_r ( $result );
		}
	} // City + Lat + Lng
	elseif (($_POST ['name'] == "") && ($_POST ['zip'] == "")) {
		if (isset ( $_POST ['city'] ) && isset ( $_POST ['lat'] ) && isset ( $_POST ['long'] )) {
			$city = strip_tags ( trim ( $_POST ['city'] ) );
			$lat = strip_tags ( $_POST ['lat'] );
			$long = strip_tags ( $_POST ['long'] );
			$rating = strip_tags ( $_POST ['rating'] );
			$radius = strip_tags ( $_POST ['radius'] );
				
			$result = $data_foursq->CityLatLngRadiusRating ( $lat, $long, $city, $radius, $rating );
			//instead of print call the database for storing
			print_r ( $result );
		}
	} elseif (($_POST ['city'] == "") && ($_POST ['zip'] == "")) {
		if (isset ( $_POST ['name'] ) && isset ( $_POST ['lat'] ) && isset ( $_POST ['long'] )) {
			$name = strip_tags ( trim ( $_POST ['name'] ) );
			$lat = strip_tags ( $_POST ['lat'] );
			$long = strip_tags ( $_POST ['long'] );
			$rating = strip_tags ( $_POST ['rating'] );
			$radius = strip_tags ( $_POST ['radius'] );

			$result = $data_foursq->LatLongNameRadiusRating($lat,$long,$name,$radius,$rating);
			//instead of print call the database for storing
				
			print_r($result);}

	}

}// submit



?>







</body>
</html>
