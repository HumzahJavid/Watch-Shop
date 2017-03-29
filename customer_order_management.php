<?php

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$customerName= filter_input(INPUT_POST, 'custName', FILTER_SANITIZE_STRING);


$findCriteria = [
       "custName" => $customerName,

];

$Val = $db->order->find($findCriteria);


echo"<h1>Result</h1>";

if($Val->count() > 0){
            echo '<table>';
            echo '<tr><th>Customer name</th><th>Product name</th><th>Quantity</th><th>Price</th></tr>';
            foreach ($Val as $ord) {
                echo '<tr>';
                echo '<td>' . $ord["custName"] . "</td>";
                echo '<td>' . $ord["name"] . "</td>";
				echo '<td>' . $ord["quantity"] . "</td>";
				echo '<td>' . $ord["price"] . "</td>";
                echo '</tr>';
            }
            echo '</table>';
}
else{
	echo"Cannot find order";
}
/*
echo"<h1>Result</h1>";

foreach($Val as $ord){
	echo"<p>";
	echo "Customer name: ".  $ord['custName'];
	echo"<br>";
	echo"<br>";
	echo "Product name: ". $ord['name'];
	echo"<br>";
	echo"<br>";
	echo "Product quantity: ".  $ord['quantity'];
	echo"<br>";
	echo"<br>";
	echo "Product price: ".  $ord['price'];
	echo"</p>";
}

*/
$mongoClient->close();
//Close the connection






?>