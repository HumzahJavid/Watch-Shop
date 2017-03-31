<?php

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$orderId= filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_STRING);

$findCriteria = [
	   "orderID" => $orderId
];

$val = $db->orders->remove($findCriteria);
if($val['ok']==1){
    echo 'removed order' ;
}
else {
    echo 'Error deleting order';
}
//Echo result back to user

$mongoClient->close();
//Close the connection





?>