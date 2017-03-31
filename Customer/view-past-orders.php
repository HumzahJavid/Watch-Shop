<?php
session_start();
if(isset($_SESSION["loggedInUserEmail"])) {
    $email = $_SESSION["loggedInUserEmail"];
	
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

echo "<center> <h1> $email past orders </h1> </center>";

$findCriteria = [
       "email" => $email,

];

$Val = $db->orders->find($findCriteria);


echo"<h1>Result</h1>";

if($Val->count() > 0){
    foreach($Val as $ord){
    echo "<h2>";
    echo "Order ID: " . $ord['orderID'];
    echo"<br>";
    echo " Customer ID: ". $ord['customerID'];
    echo"<br>";
    echo "Customer email: " . $ord['email'];
	echo"</h2>";
	echo"<br>";
	foreach($ord['products'] as $pro){
    echo " Product name: " . $pro['name'];
	echo"<br>";
	echo " Count: " . $pro['count'];
	echo"<br>";
	echo " Product price: " . $pro['price'];
	echo"<br>";
	echo"<br>";
	echo"-------------------------------";
	echo"<br>";
	}
    echo"<br>";
    echo'<br>';
}
}
else{
	echo"Cannot find order";
}

//Close the connection
$mongoClient->close();
}else {
	echo "<h1> Please login to access the settings page </h1>";
	
	header('Refresh: 3, url = /loginPage.php');
}



?>