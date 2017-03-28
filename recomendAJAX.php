<?php
//find a way to send this as a json document
//json document got by encoding, but image url has the escaped chars

//echo "<h1> RESULTS </h1>";
	//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;
$collection = $db-> keywords;

function getTopKeyword($collection) {
$cursor = $collection ->find()->sort(array("count" => -1));
$topKeyword = " "; 
$gotTopKeyword = false;
foreach($cursor as $pro){
	if ($gotTopKeyword == false) {
	  /* echo "keyword: ". $pro['keyword'];
	   echo"<br>";
	   echo "count: " . $pro['count'];
	   echo"<br>";
	   echo "</p>";
	   */$topKeyword = $pro['keyword'];
	   $gotTopKeyword = true;
	}
}

return $topKeyword;
}


//Extract the data that was sent to the server
$topKey = getTopKeyword($collection);
//echo "<h1> topkey = $topKey </h1>";

$collection = $db -> products;
$collection2 = $db -> keywords;
printProducts($collection, $topKey);

function printProducts($collection, $keyword) {
	$findCriteria = [
    '$text' => [ '$search' => $keyword], 
 ];
	$cursor = $collection -> find($findCriteria);
	
/*foreach($cursor as $pro){
   echo "<p>";
   echo " Product id: " . $pro['_id'];
   echo"<br>";
   echo " Product ID: " . $pro['productID'];
   echo"<br>";
   echo "Product name: " . $pro['name'];
   echo"<br>";
   echo " Product price: ". $pro['price'];
   echo"<br>";
   echo " Product quantity: " . $pro['quantity'];
   echo"<br>";
   echo " Product url: " . $pro['url'];
   echo"<br>";
   echo " Product kw: " . $pro['keyword'];
   echo"<br>";
   echo "</p>";
}
echo "break here<br><br>";
*/foreach($cursor as $k => $row){
    echo json_encode($row);
}
}
//Close the connection
$mongoClient->close();

 ?>
