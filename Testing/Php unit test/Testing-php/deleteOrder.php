<?php
function deleteOrder($orderID){
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$findCriteria = [
	   "orderID" => $orderId
];

$val = $db->orders->remove($findCriteria);

$mongoClient->close();
//Close the connection

foreach($val as $ord){
	
if($ord==1){
    return 'removed order' ;
}
else {
    return 'Error deleting order';
}

}

}


?>