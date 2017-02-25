<?php
    session_start();
    //Start session management
	
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
	
    $mongoClient = new MongoClient();
    $db = $mongoClient->ecommerce;
    //Connect to MongoDB and select database
   
    $findCriteria = [
        "email" => $email, 
     ];
	//Create a PHP array with our search criteria
    
    $cursor = $db->customers->find($findCriteria);
	//Find all of the customers that match  this criteria
    
    if($cursor->count() == 0){
        echo 'Email not recognized.';
        return;
    }
    else if($cursor->count() > 1){
        echo 'Database error: Multiple customers have same email address.';
        return;
    }
	//Check that there is exactly one customer
    
   
    $customer = $cursor->getNext();
    //Get customer
    
    if($customer['password'] != $password){
        echo 'Password incorrect.';
        return;
    }
	//Check password
     
    $_SESSION['loggedInUserEmail'] = $email;
    //Start session for this user
    
    echo 'ok';  
    //Inform web page that login is successful
   
    $mongoClient->close();
    //Close the connection
    