<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Basic Search</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<div class="tabs">
<ul class="list-inline">
  <li class="active"><a href="#">Basic Search</a></li>
  <?php
  if(!isset($_SESSION['login'])) { 
  ?>
  <li><a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="<a href='homepage.php' title='test add link'>Login</a>" data-original-title="Login required">Meet halfway</a></li>
  <?php
  }
  else {
  ?>
  <li><a href="#">Meet halfway</a></li>
  <?php
  } 
  ?>
</ul>
</div>

<div class="tab-content">
    <div id="tab1" class="active">
    <form method="post" action="" name="basicSearchForm" id="basicSearchForm">
	Venue:<input type="search" name="venue" id="venue"><br><br>
	City: <input type="search" name="city" id="city"><br><br>
	<input type="submit" name="basicSearch" id="basicSearch" value="Search"/>
	</form>
    </div>
	
    <div id="tab2" class="tab2">
    <form method="post" action="" name="meethalfwayForm" id="meethalfwayForm">
    <br><br>
	Zip/Address#1:<input type="search" name="address1" id="address1"><br><br>
	Zip/Address#2: <input type="search" name="address2" id="address1"><br><br>
	
	Radius:<select>
	<option value="1">1 mile</option>
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
	
	<input type="submit" name="meethalfwaySearch" id="meethalfwaySearch" value="Search" />
	</form>
	</div>
</div>
<script type="text/javascript">
$("[data-toggle=popover]")
.popover({html:true});
</script>
</body>
</html>

