<?php
$mongoClient = new MongoClient();
//Connect to database

$db = $mongoClient->ecommerce;
//Select a database

$productID= filter_input(INPUT_POST, 'productID', FILTER_SANITIZE_STRING);
$deleteQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

$findCriteria = [
    "productID" => $productID, 
 ];
//Create a PHP array with our search criteria

$cursor = $db->products->find($findCriteria);
//Find all of the customers that match this criteria

foreach ($cursor as $field){
$ID= $field['_id'];
$productName = $field['name'];
$productPrice = $field['price'];
$oldProductQuantity = ($oldProductQuantity - $deleteQuantity);
$url = $field['url'];
$productKeyword = $field['keyword'];
}
//get all the information, reinsert it into mongoDB with different field for quantity.

$productQuantity = ($oldProductQuantity - $deleteQuantity);
//calculate the new product quantity

$dataArray = [
    "_id" => new MongoId($ID), 
	"productID" => $productID,
    "name" => $productName, 
    "price" => $productPrice,
	"quantity" => $productQuantity,
	"url" => $url,
	"keyword" => $productKeyword
 ];
 //create product dataArray with a new product quantity

$Val = $db->product->save($dataArray);

if($Val['ok']==1){
	echo 'Ok ' . $Val['n'] . ' documents deleted.';
}
else{
	echo 'there is an error please try again';
}
$mongoClient->close();
?>
