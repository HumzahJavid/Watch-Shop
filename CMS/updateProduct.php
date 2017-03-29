<?php 
//formerly save.php... 
//TODO: fix issue where it creates a new product with updated details (instead of replacing product) 
$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->products;
//Select a collection 

$ID= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$productID= filter_input(INPUT_POST, 'productID', FILTER_SANITIZE_STRING);
$productName= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$productPrice = (int) filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$productQuantity = (int) filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$productKeyword = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);
$dataArray = [
    "_id" => new MongoId($ID), 
	"productID" => $productID,
    "name" => $productName, 
    "price" => $productPrice,
	"quantity" => $productQuantity,
	"url" => $url,
	"keyword" => $productKeyword
 ];
 
 $val = $collection -> save($dataArray);
 
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