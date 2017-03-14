<?php

$mongoClient = new MongoClient();
//Connect to database

$db = $mongoClient->ecommerce;
//Select a database

$collection = $db->products;

$productID= filter_input(INPUT_POST, 'productID', FILTER_SANITIZE_STRING);
$deleteQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

$findCriteria = [
    "productID" => $productID, 
 ];
//Create a PHP array with our search criteria

$cursor = $collection->find($findCriteria);
//Find all of the products that match this criteria (should only be one)

foreach ($cursor as $field){
$oldProductQuantity = $field['quantity'];
}
//get the oldProductQuantity

$productQuantity = ($oldProductQuantity - $deleteQuantity);
//calculate the new product quantity

$Val = $collection->update(
    array('productID' => $productID),
    array(
        '$set' => array("quantity" => $productQuantity),
    )
);

if($Val['ok']==1){
	echo 'Ok ' . $Val['n'] . ' documents deleted.';
}
else{
	echo 'there is an error please try again';
}
$mongoClient->close();
?>
