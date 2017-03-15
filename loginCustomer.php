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
        echo '<h1> Email not recognized <br>
					Redirecting...</h1> ';
					
		header('Refresh: 3, url = /loginPage.php');
    }
    else if($cursor->count() > 1){
        echo 'Database error: Multiple customers have same email address.';
        echo '<h1> Redirecting...</h1>';
					
		header('Refresh: 3, url = /loginPage.php');
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
    
    echo '<h1>Login successful <br>
					Redirecting...</h1> ';
					
	header('Refresh: 3, url = /index.php');
    //Inform web page that login is successful
   
    $mongoClient->close();
    //Close the connection
    