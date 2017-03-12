<?php
//needs implementing, of searching for a product to delete
$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database

 

$productID= filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_STRING);
$productQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

$removeProduct = [
        "ID" => $productID,
        "quantity" => $productQuantity		
];

var_dump($removeProduct);

$Val = $db->product->remove($removeProduct);

if($Val['ok']==1){
	echo 'Ok ' . $Val['n'] . ' documents deleted.';
}
else{
	echo 'there is an error please try again';
}

$mongoClient->close();



?>