<?php 

function updateProduct($productID, $productName, $productPrice, $productQuantity, $url){
	
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
 ];
 
 $val = $collection -> save($dataArray);
 
 if($val['ok']==1){
    return 'ok' ;
}
else {
    return 'Error adding customer';
}
//Echo result back to user

$mongoClient->close();
//Close the connection

}
?>