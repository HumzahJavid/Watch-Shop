<?php

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->customers;
//Select a collection 

$name= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
//Extract the data that was sent to the server

$dataArray = [
    "username" => $name, 
    "email" => $email, 
    "password" => $password,
	"number" => $number
 ];
 //Convert to PHP array

$returnVal = $collection->insert($dataArray);
//Add the new product to the database

if($returnVal['ok']==1){
    echo 'ok' ;
}
else {
    echo 'Error adding customer';
}
//Echo result back to user

$mongoClient->close();
//Close the connection




