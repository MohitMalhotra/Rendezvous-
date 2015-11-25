<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["withoutid"]);
unset($_SESSION["username"]);
header("Location:homepage.php");
?>