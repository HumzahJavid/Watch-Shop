<?php
function printKeyword($Val2) {
foreach($Val2 as $keyword){
   echo "<p>";
   echo "ID: " . $keyword['_id'];
   echo"<br>";
   echo "Keyword: ". $keyword['keyword'];
   echo"<br>";
   echo "Count: " . $keyword['count'];
   echo"<br>";
   echo "</p>";
}	
}

function updateKeywordCount($collection, $keyword) {
	//increment the count of the keyword by 1
$collection ->update(
    array('keyword' => $keyword),
    array(
        '$inc' => array("count" => 1)
    )
);
}

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
 
 $Val = $db-> products -> find($findCriteria);
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
   echo "</p>";
}


$Val2 = $db-> keywords -> find($findCriteria);
$collection = $db -> keywords;
foreach ($Val2 as $keyword) {
   $kw = $keyword['keyword'];
} //extract exact matching keyword

echo "Keyword Count before search:";
printKeyword($Val2);
//print keyword document (id, keyword and count)

updateKeywordCount($collection, $kw);

 echo "Keyword Count After search:";
 printKeyword($Val2);
//print keyword document (id, keyword and count)
}

catch(Exception $e){
    echo'Error cannot identify the data please try again';
}

//Close the connection
$mongoClient->close();
 
 
 ?>
