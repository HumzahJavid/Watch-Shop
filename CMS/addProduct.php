<?php 
include('..\common.php');

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->products;
//Select a collection 

$productID = newID($collection);
$productName= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$productPrice = (int) filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$productQuantity = (int) filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$keyword = filter_input(INPUT_POST, 'keyword', FILTER_SANITIZE_STRING);

$dataArray = [ 
	"productID" => $productID,
    "name" => $productName, 
    "price" => $productPrice,
	"quantity" => $productQuantity,
	"url" => $url,
	"keyword" => $keyword
 ];
 
 $val = $collection -> insert($dataArray);
 
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