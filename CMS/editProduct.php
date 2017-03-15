<?php 
include('..\common.php');

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->products;
//Select a collection 

$productID= filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);
$productName= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$productPrice = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$productQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);

$dataArray = [
	"productID" => $productID,
    "name" => $productName, 
    "price" => $productPrice,
	"quantity" => $productQuantity,
	"url" => $url,
    "_id" => new MongoId($id)
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