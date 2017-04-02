<?php

function addCustomer($customerID, $username, $email, $password, $number){
	
$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->customers;
//Select a collection 


$findCriteria = [ 
	"email" => $email,
];
//Create a PHP array with our search criteria

$cursor = $db->customers->find($findCriteria);
//Find all of the customers that match this criteria

 if($cursor->count() == 0){
	//if no duplicate emails are found 
	$dataArray = [
		"customerID" => $customerID,
		"username" => $username, 
		"email" => $email, 
		"password" => $password,
		"number" => $number
	];
	//Convert to PHP array

	$returnVal = $collection->insert($dataArray);
	//Add the new product to the database
	
	foreach($returnVal as $cus)
	if($cus==1){
		echo "Registration successful $email" ;
	} else {
		echo 'Error adding customer';
	}
	//Echo result back to user
	
 } else {
		echo 'Error: Email already exists';
 }
 
$mongoClient->close();
//Close the connection

}


?>