<?php

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$customerEmail= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);


$findCriteria = [
       "email" => $customerEmail,

];

$Val = $db->orders->find($findCriteria);


echo"<h1>Result</h1>";

if($Val->count() > 0){
            echo '<table>';
            echo '<tr><th>Customer ID</th><th>Customer email</th><th>Product name</th><th>Count</th><th>Price</th></tr>';
            foreach ($Val as $ord) {
                echo '<tr>';
				echo '<td>' . $ord["customer_ID"] . "</td>";
                echo '<td>' . $ord["email"] . "</td>";
				foreach ($ord["products"] as $pro) {
					
                echo '<td>' . $pro["name"] . "</td>";
				echo '<td>' . $pro["count"] . "</td>";
				}
                echo '</tr>';
            }
            echo '</table>';
}
else{
	echo"Cannot find order";
}

$mongoClient->close();
//Close the connection






?>
