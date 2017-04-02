<?php
require_once('..\simpletest\autorun.php');
require_once('search_Product.php');

class searchProductsTest extends UnitTestCase{
	function testSearchProducts(){
		$search_strings = "Rolex";
		$dropDownMenu = "price(ascending)";
		
		while(searchProduct($search_strings)){
			sortProduct($dropDownMenu);
		}
		
		$this->assertTrue(searchProduct($search_strings));
		
		
	}
}







?>