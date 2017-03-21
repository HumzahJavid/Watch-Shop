<?php
include('common.php');
$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->customers;
//Select a collection 

$customerID = newID($collection);

$username= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
//Extract the data that was sent to the server

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
	if($returnVal['ok']==1){
		echo '<h1> Registration successful <br>
					Redirecting...</h1> ' ;
		//header('Refresh: 3, url = /loginPage.php');
	} else {
		echo 'Error adding customer';
	}
	//Echo result back to user
	
 } else {
		echo '<h1> Error: Email already exists <br>
					Redirecting...</h1> ';
		//header('Refresh: 3, url = /registrationPage.php');
		//If the email already exists, redirect to registration page
 }
 
$mongoClient->close();
//Close the connection




