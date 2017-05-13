<?php
require_once('..\simpletest\autorun.php');
require_once('editProducts.php');

class edditProductTest extends UnitTestCase{
	function testEdditProduct(){
		$productID = "015";
		
		$test = updateProduct($productID, "Hublot(2)", "400", "65", "images/product/6.png", "Hublot(2)");
		
		$this->assertTrue($test);
		
	}
}







?>