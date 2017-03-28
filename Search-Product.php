<?php
function printKeyword($Val2) {
foreach($Val2 as $keyword){
   echo "Count: " . $keyword['count'];
   echo "<br>";
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
    
echo "<h1>Results</h1>";


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

$products = $db->products-> find($findCriteria);
$Val = $db->products-> find($findCriteria)->sort(array("price" => -1));

		

//Close the connection
$mongoClient->close();
 
 ?>
 
<p>
SORT BY
<form action="#" method="post">
<select name="selected">
<option value="" >Select</option>
<option value="price(ascending)">Price LOW to HIGH</option>
<option value="price(descending)">Price HIGH to LOW</option>
<option value="quantity(ascending)">Quantity LOW to HIGH</option>
<option value="quantity(descending)">Quantity HIGH to LOW</option>
<option value="alphabetical(ascending)">A-Z</option>
<option value="alphabetical(descending)">Z-A</option>
</select>
<input type="submit" name="submit" value="Submit">
</p>

<?php

function printProduct($Val) {
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

if (isset($_POST['submit'])) {

$dropDownMenu = $_POST['selected'];


echo"$dropDownMenu";

switch($dropDownMenu){
	case "price(ascending)":
	$Val = $products->sort(array("price" => 1));
	printProduct($Val);

	break;
	case "price(descending)":
	
	$Val = $products->sort(array("price" => -1));
	printProduct($Val);
	
	break;
	case "quantity(ascending)":
	
	$Val = $products->sort(array("quantity" => 1));
	printProduct($Val);
	
	break;
	case "quantity(descending)":
	
	$Val = $products->sort(array("quantity" => -1));
	printProduct($Val);
	
	break;
	case "alphabetical(ascending)":
	
	$Val = $products->sort(array("name" => 1));
	
	printProduct($Val);
	break;
	case "alphabetical(descending)":
	
	$Val = $products->sort(array("name" => -1));
	
	printProduct($Val);
	break;
	
	
	default:
	printProduct($Val);
	break;	
	} //end switch
} // end if isset 
else{
printProduct($Val);
}
?>
