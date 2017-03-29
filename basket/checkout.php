<?php
//Include the PHP functions to be used on the page 
include('../common.php');

//Output header and navigation 
outputHeader("Group 22 Watch Website - CMS");
outputBodyTag();

if(isset($_SESSION["loggedInUserEmail"])) {
	
	$customer = $_SESSION["loggedInUserEmail"];
	
outputBannerNavigation("$customer's Checkout page");

	
$mongoClient = new MongoClient();
//Connect to database

$db = $mongoClient->ecommerce;
//Select a database


    $fields = ['_id' => true, 'customerID' => true];
	$findCriteria = [ 'email' => $customer];
	//only return the email, customerID (and the default '_id')
	
 $cursor = $db->customers->find($findCriteria, $fields);

 
echo '
<!-- Contents of the page -->
<div id="content">';

foreach ($cursor as $cust){
$customerID = $cust['customerID'];
				echo 'CustomerID: ' . $cust["customerID"] . ' 
				Email: ' . $customer . '';
}

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
	$productID = $productArray[0]['productID'];
	$productName = $productArray[0]['name'];
	$productCount = $productArray[0]['count'];
	$productPrice = $productArray[0]['price'];
	
	$uniqueProducts[] = array("id" => $product, "name" => $productName, "count" => $productCount, "productID" => $productID, "price" => $productPrice);
	//store the first product (which will have the highest count of the first unique product)
	
	$newProductQuantity = ($productCount * -1);
		echo"<h1> $newProductQuantity prod quan  </h1>";
		$db->products->update(
			array('productID' =>  $productID),
			array('$inc' => array("quantity" => $newProductQuantity))
			);//end update
		//update the product table by removing the number of products purchased from the product quantity
	 
for($i=0; $i<count($productArray); $i++){
	$product = $productArray[$i]['id'];
	$productID = $productArray[$i]['productID'];
	$productName = $productArray[$i]['name'];
	$productCount = $productArray[$i]['count'];
	$productPrice = $productArray[$i]['price'];

	 $found = false;
	 for ($j=0; $j<count($uniqueProducts); $j++) {
		 $uniqueProduct = $uniqueProducts[$j]['id'];
		 if ($productArray[$i]['id'] === $uniqueProducts[$j]['id']) {
			 $found = true;
		 }
	 }

	 if (!$found) {
		 //if no duplicates were found, this is a uniqueProduct (with the correct count)

		 $uniqueProducts[] = array("id" => $product, "name" => $productName, "count" => $productCount, "productID" => $productID, "price" => $productPrice);
		 //place the current uniqueProduct into uniqueProducts

		$newProductQuantity = ($productCount * -1);
		echo"<h1> $newProductQuantity prod quan  </h1>";
		$db->products->update(
			array('productID' =>  $productID),
			array('$inc' => array("quantity" => $newProductQuantity))
			);//end update
		//update the product table by removing the number of products purchased from the product quantity
	 }//end if no duplicates found 		
}//end for 
echo "<br>
<h1> Products sent to Server </h1>";


for($i=0; $i<count($uniqueProducts); $i++){
	echo '<p>Product ID: ' . $uniqueProducts[$i]['productID'] . ' Name: ' . $uniqueProducts[$i]['name'] . '  Count: ' . $uniqueProducts[$i]['count'] . '  Price: ' . $uniqueProducts[$i]['price'] . '</p>';
}


$customerOrder = array("orderID" => newID($db->orders), "customerID" => $customerID, "email" => $customer, "products" => $uniqueProducts);
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
echo '
</div>';
} else {
	echo "<h1> Redirecting... </h1> 
	customer is not logged in ";
	header('Refresh: 3, url = /loginPage.php');
}


video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer


?>