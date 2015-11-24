<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form method="post" action="basicsearch.php" name="Form">
 <p>New Password:<input type="password" name="pass1" value="" ></p>
 <p>Confirm Password:<input type="password" name="pass2" value="" ></p>
 <p class="submit"><input type="submit" name="change" value="Change"></p>
 <script>
    function myFunction() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        if (pass1 != pass2) {
            alert("Passwords don't match")
        }
        else {
            alert("Password confirmed");
        }
    }
</script>
</body>
</html>

 