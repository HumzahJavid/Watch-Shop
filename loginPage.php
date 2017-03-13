<?php
//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("Group 22 Watch Website - Login");
outputBodyTag();
outputBannerNavigation("Login");
?>

<!-- Contents of the page -->
<div id="content">
    <div id ="loginPara">
        <p>To purchase a product you must be logged in, you will be prompted to login when checking out if you have not done so already</p>
        <form action="loginCustomer.php" id="loginDetails" method="post">
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

    <script src="JS/loginPage.js"></script>

    <p>Don't have an account? <a id="hyperlink" href="registrationPage.php" title="Click here to create an account">Sign up now</a></p>
</div> <!-- end content -->

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
lockLogin();
outputFooter();
//Output the footer
?>
  

