<?php
//Include the PHP functions to be used on the page 
include('../common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - Login");
outputBannerNavigation("CMS - Login");
outputBodyTag("checkLogin()");


    session_start();
    //Start session management
	
if (isset($_SESSION['loggedInAdminEmail'])){
		$admin = $_SESSION['loggedInAdminEmail'];
		header('Refresh: 0, url = /CMS/loginCMS.php');
		//If the admin is already logged in, redirect to page which displays "redirect message"
	}
?>

<!-- Contents of the page -->
<div id="content">
    <div id ="loginPara">
        <p>To access the CMS, please login as an administrator</p>
        <form action="/CMS/loginCMS.php" id="loginDetails" method="post">
            Email:<br>
            <span id="emailError2" class="hidden"></span><input type="email" id="emailInput" name="email" title="Enter an email address"><span id="emailError" class="error"></span>
            <br>
            Password:<br>
            <span id="passwordError2" class="hidden"></span><input type="password" id="passwordInput" name="password" title="Enter a password"><span id="passwordError" class="error"></span>
            <br><br>
            <input type="submit" value="login" title="Login">
        </form>
    </div> 
    <p id ="loginFailure" class="error"></p>

    <script src="/JS/loginPage.js"></script>

    <p>Don't have an account? <a id="hyperlink" href="registrationPage.php" title="Click here to create an account">Sign up now</a></p>
</div> <!-- end content -->

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>
  

