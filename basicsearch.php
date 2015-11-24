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
  <!-- <li><a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="test content <a href='' title='test add link'>link on content</a>" data-original-title="test title">Meet halfway</a></li> -->
  <li><a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="<a href='homepage.php' title='test add link'>homepage.php</a>" data-original-title="Login required">Meet halfway</a></li>
</ul>
</div>

<div class="tab-content">
    <div id="tab1" class="active">
    <form>
	Venue:<input type="search" name="venue"><br><br>
	City: <input type="search" name="city"><br><br>
	<button type="Submit" name="btn-search" onsubmit="searchoutput.php">Search</button>
	</form>
    </div>
	
    <div id="tab2" class="tab">
    <form><br><br>
	Zip/Address#1:<input type="search" name="address1"><br><br>
	Zip/Address#2: <input type="search" name="address2"><br><br>
	
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
	
	<button type="Submit" name="btn-search">Search</button>
	</div>
</div>
<script type="text/javascript">
$("[data-toggle=popover]")
.popover({html:true});
</script>
</body>
</html>

