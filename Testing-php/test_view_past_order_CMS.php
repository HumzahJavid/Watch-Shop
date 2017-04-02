<?php
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\simpletest\autorun.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\cmsOrder.php');
//require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\addProducts.php');

class viewPastOrederTest extends UnitTestCase{
	function testAddProducts(){
		$email = "j@h";
		$orderID ="006";
		
		$this->assertTrue(pastOrder($email));
		
		deleteOrder($orderID);
	}
}







?>