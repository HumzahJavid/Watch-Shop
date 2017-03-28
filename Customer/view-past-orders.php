<?php
session_start();
if(isset($_SESSION["loggedInUserEmail"])) {
    $email = $_SESSION["loggedInUserEmail"];
	
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;
$collection = $db->orders;//
$findCriteria = ["email" => $email,];
 
//Find the orders that matches this criteria
//$cursor =

//Output all the orders that this customer (email has made)
echo "<center> <h1> $email past orders </h1> </center>";

//Close the connection
$mongoClient->close();

}else {
	echo "<h1> Please login to access the settings page </h1>";
	
	header('Refresh: 3, url = /loginPage.php');
}
 