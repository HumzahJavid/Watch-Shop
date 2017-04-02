<?php
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\simpletest\autorun.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\editProducts.php');

class edditProductTest extends UnitTestCase{
	function testEdditProduct(){
		$productID = "015";
		
		$test = updateProduct($productID, "Hublot(2)", "400", "65", "images/product/6.png", "Hublot(2)");
		
		$this->assertTrue($test);
		
	}
}







?>