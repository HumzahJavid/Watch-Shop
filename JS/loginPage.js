function login() {
    var enteredUsername = document.getElementById("usernameInput").value;
    var enteredPassword = document.getElementById("passwordInput").value;
    var enteredEmail = document.getElementById("emailInput").value;
    var error = document.getElementById("loginFailure");
    blankFields(enteredUsername, enteredPassword, enteredEmail);
   
    //get the user account as an object
   
    if ((userAccount.username === enteredUsername) && (userAccount.password === enteredPassword)) {
       checkLogin();
        //run checkLogin if user has sucessfully logged in (to lock other users out of login form)
        updateBanner(); //from banner.js
    } else {
        error.innerHTML = "username/password incorrect";
    }
}




function blankFields(username, password, email) {
    var userError = document.getElementById("usernameError");
    var hiddenUserError = document.getElementById("usernameError2");
    var passError = document.getElementById("passwordError");
    var hiddenPassError = document.getElementById("passwordError2");
    var emailError = document.getElementById("emailError");
    var hiddenEmailError = document.getElementById("emailError2");
    if (username.length === 0) {
        userError.innerHTML = "*username is missing";
        hiddenUserError.innerHTML = userError.innerHTML;
    } else {
        userError.innerHTML = "";
        hiddenUserError.innerHTML = userError.innerHTML;
    }

    if (password.length === 0) {
        passError.innerHTML = "*password is missing";
        hiddenPassError.innerHTML = passError.innerHTML;
    } else {
        passError.innerHTML = "";
        hiddenPassError.innerHTML = passError.innerHTML;
    }

    if (email.length === 0) {
        emailError.innerHTML = "*email is missing";
        hiddenEmailError.innerHTML = emailError.innerHTML;
    } else {
        emailError.innerHTML = "";
        hiddenEmailError.innerHTML = emailError.innerHTML;
    }
}

