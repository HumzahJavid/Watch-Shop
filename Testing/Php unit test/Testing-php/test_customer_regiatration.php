<?php
require_once('..\simpletest\autorun.php');
require_once('Exist-delete-Customer.php');
require_once('addCustomer.php');

class addCustomerTest extends UnitTestCase{
	function testAddCustomer(){
		$customerID = "023";
		
		while(customerExists($customerID)){
			deleteCustomer($customerID);
		}
		
		addCustomer($customerID, "ta", "i@i", "1234", "0741");
		
		$this->assertTrue(customerExists($customerID));
		
		deleteCustomer($customerID);
	}
}







?>