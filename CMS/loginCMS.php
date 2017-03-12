<?php
    session_start();
    //Start session management
	
	if (isset($_SESSION['loggedInAdminEmail'])){
		$admin = $_SESSION['loggedInAdminEmail'];
		header('Refresh: 3, url = /CMS/CMS.php');
		echo "<h1> Already logged in Redirecting.....$admin </h1>";
		return;
	}
	//If the admin is already logged in display message, redirect to CMS page

	  
	$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);  
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
	
    $mongoClient = new MongoClient();
    $db = $mongoClient->ecommerce;
    //Connect to MongoDB and select database
   
    $findCriteria = [
        "email" => $email, 
     ];
	//Create a PHP array with our search criteria
    
    $cursor = $db->admin->find($findCriteria);
	//Find all of the customers that match  this criteria
    
    if($cursor->count() == 0){
		header('Refresh: 3, url = /CMS/CMSLoginPage.php');
		echo '<h1> Email not recognized.... Try again</h1>';
        return;
    }
    else if($cursor->count() > 1){
        echo 'Database error: Multiple customers have same email address.';
        return;
    }
	//Check that there is exactly one customer
    
   
    $admin = $cursor->getNext();
    //Get customer
    
    if($admin['password'] != $password){
		header('Refresh: 3, url = /CMS/CMSLoginPage.php');
		echo '<h1> Password Incorrect... Try again</h1>';
		return;
    }
	//Check password
     
    $_SESSION['loggedInAdminEmail'] = $email;
    //Start session for this user
    
     
	
  header('Refresh: 3, url = /CMS/CMS.php');
  echo '<h1> Login successful Redirecting.....</h1>';
    //Login successful, redirect to CMS
	
    $mongoClient->close();
    //Close the connection
	
    exit;

$mongoClient->close();
//Close the connection




    