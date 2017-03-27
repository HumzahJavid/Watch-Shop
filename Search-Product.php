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

if (isset($_POST['submit'])) {

$dropDownMenu = $_POST['selected'];


echo"$dropDownMenu";

switch($dropDownMenu){
	case "price(ascending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("price" => 1));
	
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
	break;
	case "price(descending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("price" => -1));
	
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
	break;
	case "quantity(ascending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("quantity" => 1));
	
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
	break;
	case "quantity(descending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("quantity" => -1));
	
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
	break;
	case "alphabetical(ascending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("name" => 1));
	
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
	break;
	case "alphabetical(descending)":
	
	$Val = $db->products-> find($findCriteria)->sort(array("name" => -1));
	
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
	break;
	
	
	default:
	echo"yolo";
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
	   break;
	
	
}

}
else{

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
?>
