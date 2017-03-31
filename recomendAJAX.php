<?php
function getHighestKeywordCount($collection) {
	//returns the highest number found (from the count field) in the array 
	$cursor = $collection ->find()->sort(array("count" => -1));
	$maxCount = 0;
	//the highest number found for the count field

	foreach($cursor as $pro){
		if ($pro['count'] > $maxCount) { 
		   $maxCount = $pro['count'];
		}
	} //end for each
	return $maxCount;
}

function getTopKeyword($collection, $maxCount) {
	//returns all the keywords with the highest count
	$findCriteria = [
		"count" => $maxCount,
	];
	$cursor = $collection ->find($findCriteria)->sort(array("count" => -1));
	$topKeywordsArray = array();
	foreach($cursor as $pro){
		$topKeywordsArray[] = $pro['keyword'];
	}

	return $topKeywordsArray;
}

function printProducts($collection, $keywords) {
	//finds and prints all the product documents (corresponding to the keyword array),
	//in a JSON format
	foreach($keywords as $keyword) {
		$findCriteria = ['$text' => [ '$search' => $keyword], ];
		$cursor = $collection -> find($findCriteria);
		
		foreach($cursor as $k => $row){
			echo json_encode($row);
			echo "*";
			//delimits each JSON doc
		}//for each product 
	} //end for each unique keyword
}//end print products

function  extractProducts($collection) {
	//extracts the ordered products from the customer order history
	//returns an array of keywords
	$productArray = array();
	
    $email = $_SESSION["loggedInUserEmail"];
	$findCriteria = ["email" => $email,];
 
	$Cursor = $collection->find($findCriteria);
	//Find the customers that matches this criteria
	
	foreach ($Cursor as $ord) {
		foreach ($ord["products"] as $pro) {
			$keyword = $pro['keyword'];
			if (!(in_array($keyword, $productArray))) {
				//if the current keyword is not in the array 
				$productArray[] = $keyword;
				//add it to the product array 
			}//end if
		}//for each product 
	}//for all orders
	return $productArray;
}//end extractProducts

session_start();

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db -> products;
$collection2 = $db -> keywords;
$collection3 = $db -> orders;

if (isset ($_SESSION["loggedInUserEmail"])) {
	$trackedKeywords = extractProducts($collection3);
	//keywords based on customers order history
	printProducts($collection, $trackedKeywords);
} else {
	$maxCount = getHighestKeywordCount($collection2);
	//highest count for the top keywords (of the most popular products)
	$topKey = getTopKeyword($collection2, $maxCount);
	//keywords matching the count
	printProducts($collection, $topKey);
}

//Close the connection
$mongoClient->close();
 ?>
