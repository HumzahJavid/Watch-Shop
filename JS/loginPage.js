var userArray = JSON.parse(localStorage.getItem("USERARRAY"));

function checkLogin() {
    var loggedInEmail = sessionStorage.getItem("loggedInEmail");
    var loggedIn;
    if ((sessionStorage.getItem("loggedInEmail") !== undefined) && (userArray !== null)) {
	 for (var i = 0; i < userArray.length; i++) {
            //for every user object in the userArray
            if (userArray[i].email === loggedInEmail) {
                //find the logged in user accoutn from the array by comparing emails 
                loggedIn = userArray[i];
                //extract details of logged in user (store it in loggedIn)
                document.getElementById("loginPara").innerHTML = "Hi " + loggedIn.username + "  " + loggedIn.email;
                //display login message/lock user out of login form 
            }//end if email is found 
        }//end loop for extracting user details
    } //end if user is logged in 
}//end check log in 

function login() {
    alert(JSON.stringify(localStorage));
    var enteredUsername = document.getElementById("usernameInput").value;
    var enteredPassword = document.getElementById("passwordInput").value;
    var enteredEmail = document.getElementById("emailInput").value;
    var userArray = JSON.parse(localStorage.getItem("USERARRAY"));
    //extract the object from local storage String
    var matchedUserAccountIndex = -1;
    var error = document.getElementById("loginFailure");
    blankFields(enteredUsername, enteredPassword, enteredEmail);
    for (var i = 0; i < userArray.length; i++) {
//for every user object in the userArray
        if (userArray[i].email === enteredEmail) {
            error.innerHTML = "";
            matchedUserAccountIndex = i;
            //if the email entered on the form matches one of the email in the local storage,
            //then it is a valid account
        }
    }
    var userAccount = userArray[matchedUserAccountIndex];
    //get the user account as an object
    if (matchedUserAccountIndex === -1) {
        error.innerHTML = "Email not recognised";
    }

    if ((userAccount.username === enteredUsername) && (userAccount.password === enteredPassword)) {
        error.innerHTML = "";
        //if the entered username and password match the details of the user account 
        sessionStorage.setItem("loggedInEmail", userAccount.email);
        //store the accounts email in local storage (to represent the logged in user)
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

