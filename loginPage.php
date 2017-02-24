<?php
//Include the PHP functions to be used on the page 
include('common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - Login");

outputBannerNavigation("Login");
outputBodyTag("checkLogin()");
//by luck I enclosed function in speech marks thus resolving fatal error message(call to undefined function)
?>

<!-- Contents of the page -->
<div id="content">
    <div id ="loginPara">
        <p>To purchase a product you must be logged in, you will be prompted to login when checking out if you have not done so already</p>
        <form id="loginDetails" onsubmit = "return false">
            Username:<br>
            <span id="usernameError2" class="hidden"></span><input type="text" id="usernameInput" title="Enter a username" autofocus> <span id="usernameError" class="error"></span>
            <br>
            Password:<br>
            <span id="passwordError2" class="hidden"></span><input type="password" id="passwordInput" title="Enter a password"><span id="passwordError" class="error"></span>
            <br>
            Email:<br>
            <span id="emailError2" class="hidden"></span><input type="email" id="emailInput" title="Enter an email address"><span id="emailError" class="error"></span>
            <br><br>
            <input type ="submit" value = "login" onclick="login()">
        </form>
    </div> 
    <p id ="loginFailure" class="error"></p>

    <script src="JS/loginPage.js"></script>

    <p>Don't have an account? <a id="hyperlink" href="registrationPage.html" title="Click here to create an account">Sign up now</a></p>

	

</div> <!-- end content -->

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>