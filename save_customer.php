<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the customer details 
$name= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$phone= filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Construct PHP array with data
$customerData = [
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
}
else {
    echo 'Error saving customer';
}

//Close the connection
$mongoClient->close();


