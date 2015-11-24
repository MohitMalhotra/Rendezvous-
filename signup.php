<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>User Sign Up</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
      <h1>Sign Up</h1>
      <form method="post" action=".html" name="Form">
        <p>First Name:<input type="text" name="fname" value="" ></p>
		<p>Last Name:<input type="text" name="lname" value="" ></p>
		<p>Address:<textarea id="address" rows="10" cols="70" name="address" value="" ></textarea></p>
	    <p>City:<input type="text" name="city" value="" ></p>
		<p>State:<input type="text" name="state" value="" ></p>
		<p>ZIP Code:<input id="zip" name="zip" pattern="[\d]{5}(-[\d]{4})" ></p>
		<p>Phone:<input type="tel" ></p>
	<p>Email:<input type="email" name="email" autocomplete="off" value="" ></p>
        <p>Password:<input type="password" name="password" value="" ></p>
        <p>Choose a security question#1:
		<select>
  <option value="one">What is your mother's maiden name?</option>
  <option value="two">What is your favourite teacher's name?</option>
  <option value="three">What is the name of your elementary school?</option>
</select>
		 <p>Security Answer#1:<input type="text" name="answer1" value="" ></p>
		  <p>Choose a security question#2:
		  <select>
  <option value="one">Which year was your father born?</option>
  <option value="saab">What is your favourite food?</option>
  <option value="opel">What is the name of your pet's name?</option>
</select>
		  <p>Security Answer#2:<input type="text" name="answer2" value=""></p>
        <p class="submit"><input type="submit" name="commit" value="Sign up"></p>
      </form>
    </div>
</body>
</html>