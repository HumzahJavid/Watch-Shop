<?php

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;


$orderId= filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_STRING);

$findCriteria = [
	   "ID" => $orderId
];

$Val = $db->products->findOneAndDelete($findCriteria);

if($val['ok']==1){
    echo 'ok' ;
}
else {
    echo 'Error adding customer';
}
//Echo result back to user

$mongoClient->close();
//Close the connection





?>