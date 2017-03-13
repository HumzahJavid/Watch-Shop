<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

echo "<p> search_string <p> = $search_string";
echo"<br> <br> <br>";
echo "<h1> the checkbox is</h1>";

echo "<br>selected radio = <br>";
$selected_radio = $_POST['radioButton'];
print $selected_radio;


echo "<br>isset submit1 <br>";
if (isset($_POST['search'])) {

$selected_radio = $_POST['radioButton'];
 $findCriteria = [
    "$selected_radio" => $search_string, 
 ];
}
 

//Find all of the customers that match  this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customers</h1>"; 

        
foreach ($cursor as $cust){
    echo '<form action="/Customer/save_customer.php" method="post">';
	
    echo '<input type="hidden" name="customerID" value="' . $cust['customerID'] . '" required><br>';
    echo 'Username: <input type="text" name="username" value="' . $cust['username'] . '" required><br>';
    echo 'Email: <input type="email" name="email" value="' . $cust['email'] . '" required><br>';
    echo 'Password: <input type="text" name="password" value="' . $cust['password'] . '" required><br>'; 
	echo 'Number: <input type="text" name="number" value="' . $cust['number'] . '" required><br>';
	echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

//Close the connection
$mongoClient->close();
 