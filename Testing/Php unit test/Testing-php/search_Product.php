<?php

function searchProduct($search_strings){
	
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_strings], 
 ];
 
$Val = $db-> products -> find($findCriteria);


//Close the connection
$mongoClient->close();
 
}
 

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
function sortProduct($dropDownMenu){
	
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

//Close the connection
$mongoClient->close();

}
?>
