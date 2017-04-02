<?php
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\simpletest\autorun.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\Exist-delete-Customer.php');
require_once('C:\Users\HassanBille\Documents\GitHub\Watch-Shop\Testing\addCustomer.php');

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