<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the customer details 
$customerID = filter_input(INPUT_POST, 'customerID', FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$phone= filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$findCriteria = [ 
	"email" => $email,
];
//Create a PHP array with our search criteria

$cursor = $db->customers->find($findCriteria);
//Find all of the customers that match this criteria

 if($cursor->count() == 0){
	//if no duplicate emails are found 
		
	//Construct PHP array with data
	$customerData = [
		"customerID" => $customerID,
		"username" => $name,
		"email" => $email,
		"password" => $password,
		"number" => $phone,
		"_id" => new MongoId($id)
	];

	//Save the product in the database - it will overwrite the data for the product with this ID
	$returnVal = $db->customers->save($customerData);
		
	//Echo result back to user
	if($returnVal['ok']==1){
		echo 'ok' ;
		 $_SESSION['loggedInUserEmail'] = $email;
		//Start session for this user
	}
	else {
		echo 'Error saving customer';
	}
}  else {
		echo 'Error: Email already exists';
		//If the email already exists, redirect to registration page
 }
 

		header('Refresh: 3, url = /registrationPage.php');
//Close the connection
$mongoClient->close();


