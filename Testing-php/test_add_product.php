<?php
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\simpletest\autorun.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\productExist.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\addProducts.php');

class addProductTest extends UnitTestCase{
	function testAddProducts(){
		$productID = "017";
		
		while(productExists($productID)){
			deleteProduct($productID);
		}
		
		addProduct($productID, "test3", 391, 42, "images/product/8.png", "test3");
		
		$this->assertTrue(productExists($productID));
		
		deleteProduct($productID);
	}
}







?>