<?php
session_start();
if(isset($_SESSION["loggedInUserEmail"])) {
    $email = $_SESSION["loggedInUserEmail"];
	
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

 $findCriteria = ["email" => $email,];
 
//Find the customers that matches this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results as forms
echo "<h1>Customer details</h1>"; 

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

}else {
	echo "<h1> Please login to access the settings page </h1>";
	
	header('Refresh: 3, url = /loginPage.php');
}
 