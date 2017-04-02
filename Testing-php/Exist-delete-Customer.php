<?php

function customerExists($customerID){

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->customers;
//Select a collection 

$dataArray = [ 
	"customerID" => $customerID,
 ];
 
 $val = $collection -> find($dataArray);
 
 $mongoClient->close();
//Close the connection

 foreach($val as $cus){
 if($cus==1){
    return 'ok';
}
else {
    return 'Error adding customer';
}
//Echo result back to user

 }	
}


function deleteCustomer($customerID){

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->customers;
//Select a collection 

$dataArray = [ 
	"customerID" => $customerID,
 ];
 
 $val = $collection -> remove($dataArray);
 
 $mongoClient->close();
//Close the connection

foreach($val as $cus){
 if($cus==1){
    return 'ok' ;
}
else {
    return 'Error adding customer';
}
//Echo result back to user
}
	
}


?>