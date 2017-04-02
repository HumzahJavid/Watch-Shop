<?php
function deleteProduct($productID){
	include('..\common.php');

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$collection = $db->products;
//Select a collection 

$dataArray = [ 
	"productID" => $productID,
 ];
 
 $val = $collection -> remove($dataArray);
 
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