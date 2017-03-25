<?php
//Include the PHP functions to be used on the page 
include('common.php');
 
//Output header and navigation 
outputHeader("Group 22 Watch Website - Registration");
outputBodyTag();
outputBannerNavigation("Register");
?>
<div id="content">
    <p>On this page you can register an account, all fields are required. You must observe the following rules:</p>
    <p>The username must be between 5 and 7 characters long</p>
    <p>The password must be between 7 and 12 characters long</p>
    <p>The email must be a valid email address</p>

    <div id ="registrationPara">
       
            Username:<br>
            <span id="usernameError2" class="hidden"></span><input type="text" id="usernameInput" name="username" title="Enter a username" autofocus> <span id="usernameError" class="error"></span>
            <br>
            Password:<br>
            <span id="passwordError2" class = "hidden"></span><input type="password" id="passwordInput" name="password" title="Enter a password">  <span id="passwordError" class="error"></span>
            <br>
            Email:<br>
            <span id="emailError2" class = "hidden"></span><input type="email" id="emailInput" name="email" title="Enter an email address" required><span id="emailError" class="error"></span>
            <br>
            Phone number:<br>
            <span id="numberError2" class="hidden"></span><input type="text" id="numberInput" name="number" title="Enter a phonenumber"> <span id="numberError" class="error"></span>
            <br>
			    <script src="JS/registerAJAX.js"></script>
            <button onclick="validation()">Register</button>
      
		
        <p id="result" class="error"></p>

        <p>Already have an account?
            <a id="hyperlink" href="loginPage.html" title="Click here to login"> Click here to login </a></p>
        <!-- this button takes you to login page, in case you are on reg page by mistake. -->
    </div>

    <input type ="submit" value="Erase details" onclick="eraseUsers()">
    <input type ="submit" value="View details" onclick="viewUsers()">

</div> <!-- end content -->

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>
