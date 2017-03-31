<?php

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$customerEmail= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


$findCriteria = [
       "email" => $customerEmail,

];

$Val = $db->orders->find($findCriteria);


echo"<h1>Result</h1>";

if($Val->count() > 0){
	foreach($Val as $ord){
    echo "<h2>";
    echo "Order ID: " . $ord['orderID'];
    echo"<br>";
    echo " Customer ID: ". $ord['customerID'];
    echo"<br>";
    echo "Customer email: " . $ord['email'];
	echo"</h2>";
	echo"<br>";
	foreach($ord['products'] as $pro){
    echo " Product name: " . $pro['name'];
	echo"<br>";
	echo " Count: " . $pro['count'];
	echo"<br>";
	echo " Product price: " . $pro['price'];
	echo"<br>";
	echo"<br>";
	echo"-------------------------------";
	echo"<br>";
	}
    echo"<br>";
    echo'<br>';
}
}
else{
	echo"Cannot find order";
}
echo"<br>";
echo"<br>";

foreach ($Val as $cust){
    echo '<form action="/CMS/deleteItem.php" method="post">';
    echo 'Order ID: <input type="text" name="orderID" value="' . $cust['orderID'] . '" required><br>';
	echo '<input type="submit" value="delete">';
    echo '</form><br>';
}

$mongoClient->close();
//Close the connection






?>
