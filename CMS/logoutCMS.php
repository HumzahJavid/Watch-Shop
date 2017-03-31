<?php 
session_start();
unset($_SESSION["loggedInAdminEmail"]);  
echo "<h1> Logging out... </h1>";
echo "<h1> Redirecting... </h1>";
header('Refresh: 3, url = /index.php');	
?>
