<?php

function addProduct($productID, $productName, $productPrice, $productQuantity, $url, $keyword){

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->products;
//Select a collection 

$dataArray = [ 
    "productID" => $productID,
    "name" => $productName, 
    "price" => $productPrice,
	"quantity" => $productQuantity,
	"url" => $url,
	"keyword" => $keyword
 ];
 
 $val = $collection -> insert($dataArray);
 
 $mongoClient->close();
//Close the connection
 
 if($val['ok']==1){
    return 'ok' ;
}
else {
    return 'Error adding customer';
}
//Echo result back to user

	
}










?>