<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

echo"$search";
//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search], 
 ];
 
 
 $Val = $db-> products -> find($findCriteria);
 
 var_dump($Val);
 
echo "<h1>Results</h1>";
/*
foreach($Val as $pro){
   echo "<p>";
   echo "Product name: " . $pro['name'];
   echo"<br>";
   echo " Product price: ". $pro['price'];
   echo"<br>";
   echo " Product quantity: " . $pro['quantity'];
   echo"<br>";
   echo "</p>";
}
*/
//Close the connection
$mongoClient->close();
 
 
 ?>