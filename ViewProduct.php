<?php

$mongoClient = new MongoClient();
//Connect to database


$db = $mongoClient->ecommerce;
//Select a database


$Id= filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);

$findCriteria = [
       "_id" => new MongoId($Id),

];

$Val = $db->products->find($findCriteria);

echo"<h1>Result</h1>";

foreach($Val as $pro){
	echo"<p>";
	echo "Product name: ".  $pro['name'];
	echo"<br>";
	echo"<br>";
	echo "Product price: ". $pro['price'];
	echo"<br>";
	echo"<br>";
	echo "Product quantity: ".  $pro['quantity'];
	echo"<br>";
	echo"<br>";
	echo "url: ".  $pro['url'];
	echo"</p>";
}

foreach ($Val as $cust){
    echo '<form action="save.php" method="post">';
    echo 'Product name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
    echo 'Product price: <input type="text" name="price" value="' . $cust['price'] . '" required><br>'; 
	echo 'Product quantity: <input type="text" name="quantity" value="' . $cust['quantity'] . '" required><br>';
    echo 'url: <input type="text" name="url" value="' . $cust['url'] . '" required><br>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

?>