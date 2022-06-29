<?php
session_start();
$_SESSION["Loggedin"] = false;
unset($_COOKIE);
header("LOCATION: ../Index.php");
?>