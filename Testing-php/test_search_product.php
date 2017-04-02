<?php
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\simpletest\autorun.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing-php\search_Product.php');

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