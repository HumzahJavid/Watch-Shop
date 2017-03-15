<?php
$mongoClient = new MongoClient();
//Connect to database

$db = $mongoClient->ecommerce;
//Select a database

$collection = $db->products;

$productID= filter_input(INPUT_POST, 'productID', FILTER_SANITIZE_STRING);
$deleteQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$newProductQuantity = ($deleteQuantity * -1);

$Val = $collection->update(
    array('productID' => $productID),
    array(
        '$inc' => array("quantity" => $newProductQuantity),
    )
);
//locate the product by the productID
//decrement the quantity of that product by the amount specified in newProductQuantity (incrementing by a negative number);	

if($Val['ok']==1){
	echo 'Ok ' . $Val['n'] . ' documents deleted.';
}
else{
	echo 'there is an error please try again';
}
$mongoClient->close();
?>
