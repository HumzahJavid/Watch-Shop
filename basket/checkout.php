<?php

session_start();


$customer = $_SESSION["loggedInUserEmail"];
echo "<h1>$customer's Checkout page</h1>";


$mongoClient = new MongoClient();
//Connect to database

$db = $mongoClient->ecommerce;
//Select a database


    $fields = ['_id' => true];
	$findCriteria = [ 'email' => $customer];
	//only return the email (and the default '_id')
	
 $cursor = $db->customers->find($findCriteria, $fields);

 
foreach ($cursor as $cust){
$customer_ID = $cust['_id'];
}


echo "<br> <br>  ";	

//Extract the product IDs that were sent to the server
$prodIDs= $_POST['prodIDs'];

//Convert JSON string to PHP array 
$productArray = json_decode($prodIDs, true);
$uniqueProducts = [];

for($i=0; $i<count($productArray); $i++){
	for ($j=($i + 1); $j<count($productArray); $j++) {
		if ($productArray[$i]['id'] === $productArray[$j]['id']) {
			$productArray[$i]['count'] += 1;
			//makes the first new product have the highest count
		}
	}
}

	$product = $productArray[0]['id'];
	$productCount = $productArray[0]['count'];
	$uniqueProducts[] = array("id" => $product, "count" => $productCount);
	//store the first product (which will have the highest count of the first unique product)
	
for($i=0; $i<count($productArray); $i++){
	$product = $productArray[$i]['id'];
	$productCount = $productArray[$i]['count'];
	 $found = false;
	 for ($j=0; $j<count($uniqueProducts); $j++) {
		 $uniqueProduct = $uniqueProducts[$j]['id'];
		 if ($productArray[$i]['id'] === $uniqueProducts[$j]['id']) {
			 $found = true;
		 }
	 }
	 
	 if (!$found) {
		 //if no duplicates were found, this is a uniqueProduct (with the correct count)
		  
		 $uniqueProducts[] = array("id" => $product, "count" => $productCount);
		 //place the current uniqueProduct into uniqueProducts
	 } 		
}
echo "<br> <br>

<h1> Products sent to Server </h1>";


for($i=0; $i<count($uniqueProducts); $i++){
	echo '<p>Product ID: ' . $uniqueProducts[$i]['id'] . '.   Count: ' . $uniqueProducts[$i]['count'] . '</p>';
}


$customerOrder = array("customer" => array("customer_ID" => $customer_ID, "email" => $customer, "products" => $uniqueProducts));
//create the customerOrder document for the database



$collection = $db->orders;
//Select a collection 
 $val = $collection -> insert($customerOrder);
 
 if($val['ok']==1){
    echo 'Order successful' ;
}
else {
    echo 'Error adding order to basket';
}
//Echo result back to user

$mongoClient->close();
//Close the connection

//for the customer order array, append the 
?>