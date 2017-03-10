<?php
$mongoClient = new MongoClient();
//Connect to MongoDB

$db = $mongoClient->ecommerce;
//Select a database

$username= filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
//Extract the data that was sent to the server

$findCriteria = [
    "username" => $username, 
 ];
//Create a PHP array with our search criteria

$cursor = $db->customers->find($findCriteria);
//Find all of the customers that match this criteria

 if($cursor->count() == 0){
        echo 'No customers found.';
        return;
    }
	//Check if the customer exists

echo "<h1>Results</h1>";
//Output the results
	
foreach ($cursor as $cust){
   echo "<p>";
   echo "Customer username: " . $cust['username'];
   echo "<br>";
   echo "Email: ". $cust['email'];
   echo "</p>";
}

$mongoClient->close();
//Close the connection


