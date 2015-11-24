<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Advanced Search</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post" action="searchoutput.php" name="Form">
<p>Venue Name:<input type="search" name="venue"></p>
 <p>City: <input type="search" name="city"></p>
 <p>ZIP Code:<input type="search" name="zip" pattern="[\d]{5}(-[\d]{4})" ></p>
<p>Longitude:<input  type="text" name="long" value="" ></p>
<p>Latitude:<input  type="text" name="lat" value="" ></p>
Radius:<select>
  <option value="1">1 miles</option>
  <option value="2">2 miles</option>
  <option value="5">5 miles</option>
  <option value="10">10 miles</option>
  <option value="20">20 miles</option>
  </select><br><br>
  Ratings:
  <select>
  <option value="0">0 stars</option>
  <option value="1">1 star</option>
  <option value="2">2 stars</option>
  <option value="3">3 stars</option>
  <option value="4">4 stars</option>
  <option value="5">5 stars</option>
</select><br><br>
<button type="Submit" name="btn-search">Search</button>
</body>
</html>