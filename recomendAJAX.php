<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;
$collection = $db-> keywords;

function getHighestKeywordCount($collection) {
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


$maxCount = getHighestKeywordCount($collection);
$topKey = getTopKeyword($collection, $maxCount);

$collection = $db -> products;
$collection2 = $db -> keywords;
printProducts($collection, $topKey);

//Close the connection
$mongoClient->close();
 ?>
