<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>User Sign Up</title>
  <link rel="stylesheet" href="review.css">
</head>
<body>
      <h1>Venue</h1>
	 <p>Venue Name:<input type="text" name="vname" value="" ></p>
	 <p>Longitude:<input  type="text" name="long" value="" ></p>
	 <p>Latitude:<input  type="text" name="lat" value="" ></p>
	 <p>Address:<textarea id="address" rows="10" cols="70" name="address" value="" ></textarea></p>
	 <p>City:<input type="text" name="city" value="" ></p>
		<p>State:<input type="text" name="state" value="" ></p>
		<p>ZIP Code:<input id="zip" name="zip" pattern="[\d]{5}(-[\d]{4})" ></p>
</body>
</html>