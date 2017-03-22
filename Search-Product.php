<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_strings = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_strings], 
 ];

 
$Val = $db->products-> find($findCriteria)->sort(array("price" => 1));
	
	

try{
	
echo "<h1>Results</h1>";

foreach($Val as $pro){
   echo "<p>";
   echo "Product name: " . $pro['name'];
   echo"<br>";
   echo " Product price: ". $pro['price'];
   echo"<br>";
   echo " Product quantity: " . $pro['quantity'];
   echo"<br>";
   echo"<br>";
   echo " Product image: " . $pro['url'];
   echo"<br>";
   echo "</p>";
   echo'----------------------------------------------------';
   echo'<br>';
}

}
catch(Exception $e) {
	
	echo'Cannot identify the word that you wrote';	
}

//Close the connection
$mongoClient->close();
 
 ?>
