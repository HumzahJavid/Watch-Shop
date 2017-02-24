function detectEnterKey(id) {
    document.getElementById(id).onkeypress = function (e) {
        if (e.keyCode === '13') {
            setup();
            return false;
        }
    };
}
detectEnterKey('usernameInput');
//Initially intended to only allow the user to press enter for the username txt box, 
//but it works for all boxes, so I'm not complaing :)

function checkIfMaxUsersReached() {
    var userArray = JSON.parse(localStorage.getItem("USERARRAY"));
    if (JSON.stringify(userArray[userArray.length - 1]) !== "{}") {
        //if the last user account in user account array is signed up (no more users can be registered)
        document.getElementById("registrationPara").className = "error";
        //set class to error
        document.getElementById("registrationPara").innerHTML = "No more users can be registered (max account limit has been reached)";
        //display the message above/lock user out of registration form but keep admin buttons available 
    }
}

function User() {
    this.username;
    this.password;
    this.email;
}
//logic works like this, 
//Check if any new user can be registered if true then 
//for the first time setup, create an array of 10 users
//else just go to storeUser() (whcih extracts array of 10 users and stores current user in it)


function setup() {
    var maxUserAccounts = 10;
    console.log("values in localStorage so far = " + JSON.stringify(localStorage));
    var userArray = localStorage.getItem("USERARRAY");
    if (userArray === null) {
//if user array doesnt exist in local storage
        var userArray = [];
        for (var i = 0; i < maxUserAccounts; i++) {
            userArray[i] = new User();
        }//create an array of 10 blank users

        storeUser(userArray);
        //store the user that waiting to register their detail into the array and eventually localStorage
    } else {
        ////there is atleast one user stored in the userArray
        var stringifiedArray = userArray;
        //keep a string version for console log 
        userArray = JSON.parse(userArray);
        //extract the object from local storage String
        //user array exists

        console.log("The details of account so far " + stringifiedArray);
        //log the values of the array of user accounts
        storeUser(userArray);
        //store the user thats waiting to register their detail into the array and eventually localStorage
    }
}
function validateUsernameLength(username) {
    var length = username.length;
    var minLength = 5;
    var maxLength = 12;
    if (length === 0) {
        console.warn("username is missing");
        document.getElementById("usernameError").innerHTML = "*username is missing";
        document.getElementById("usernameError2").innerHTML = document.getElementById("usernameError").innerHTML;
        return false;
    } else if ((length < minLength) || (length > maxLength)) {
        console.error("Your username is of an invalid length it must be between " + minLength + " and " + maxLength + " characters long");
        document.getElementById("usernameError").innerHTML = "*username must be between " + minLength + " and " + maxLength + " characters long";
        document.getElementById("usernameError2").innerHTML = document.getElementById("usernameError").innerHTML;
        return false;
    } else {
        document.getElementById("usernameError").innerHTML = "";
        document.getElementById("usernameError2").innerHTML = document.getElementById("usernameError").innerHTML;
        return true;
    }
}

function validatePasswordLength(password) {
    var length = password.length;
    var minLength = 7;
    var maxLength = 12;
    if (length === 0) {
        console.warn("password is missing");
        document.getElementById("passwordError").innerHTML = "*password is missing";
        document.getElementById("passwordError2").innerHTML = document.getElementById("passwordError").innerHTML;
        return false;
    } else if ((length < minLength) || (length > maxLength)) {
        console.error("Your password is of an invalid length it must be between " + minLength + " and " + maxLength + " characters long");
        document.getElementById("passwordError").innerHTML = "*password must be between " + minLength + " and " + maxLength + " characters long";
        document.getElementById("passwordError2").innerHTML = document.getElementById("passwordError").innerHTML;
        return false;
    } else {
        document.getElementById("passwordError").innerHTML = "";
        document.getElementById("passwordError2").innerHTML = document.getElementById("passwordError").innerHTML;
        return true;
    }
}

function validateEmailLength(email) {
    var length = email.length;
    if (length === 0) {
        console.warn("email is missing");
        document.getElementById("emailError").innerHTML = "*email is missing";
        document.getElementById("emailError2").innerHTML = document.getElementById("emailError").innerHTML;
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
        document.getElementById("emailError2").innerHTML = document.getElementById("emailError").innerHTML;
        return true;
    }
}


function validateNumberLength(number) {
    var length = number.length;
    if (length === 0) {
        console.warn("number is missing");
        document.getElementById("numberError").innerHTML = "*number is missing";
        document.getElementById("numberError2").innerHTML = document.getElementById("numberError").innerHTML;
        return false;
    } else {
        document.getElementById("numberError").innerHTML = "";
        document.getElementById("numberError2").innerHTML = document.getElementById("numberError").innerHTML;
        return true;
    }
}



function validateInput(username, password, email, number) {
    var validUserLength = validateUsernameLength(username);
    var validPassLength = validatePasswordLength(password);
    var validEmailLength = validateEmailLength(email);
    var validNumberLength = validateNumberLength(number);
    if (!validUserLength || !validPassLength || !validEmailLength || !validNumberLength) {
        return false;
    } else {
        return true;
    }
}
function storeUser(userArray) {
    var result = document.getElementById("result");
    result.innerHTML = "";

    var currentUserStored = false;
    var visitorUsername = document.getElementById("usernameInput").value;
    var visitorPassword = document.getElementById("passwordInput").value;
    var visitorEmail = document.getElementById("emailInput").value;
    var visitorNumber = document.getElementById("numberInput").value;
    var validInputLength = validateInput(visitorUsername, visitorPassword, visitorEmail, visitorNumber);
    if (validInputLength) {
        result.innerHTML = "";
        console.log("Your input is valid, in terms of length");
        var duplicate = false;
        for (var i = 0; i < userArray.length; i++) {
            if (userArray[i].email === visitorEmail) {
                console.log("This account already exists and will not be registered again");
                duplicate = true;
            }
        } //check for duplicates

        if (duplicate) {
//if the email address being registered is already in the user accounts array,
//then dont register it (do nothing)
            result.innerHTML = "This account already exists and will not be registered again";
        } else {
            //if the account is NOT a duplicate
            for (var i = 0; i < 10; i++) {
                //loop through the array and find the first slot where a user has not been registered
                var accountString = JSON.stringify(userArray[i]);
                if ((accountString === "{}") && (!currentUserStored)) {
                    //if the current account is empty and a user has not been stored 
                    userArray[i].username = visitorUsername;
                    userArray[i].password = visitorPassword;
                    userArray[i].email = visitorEmail;
                    userArray[i].number = visitorNumber;
                    userArray[i].highestLevel = -1;
                    //default value for level (higher level is better)
                    userArray[i].score = 999;
                    //default value for score (lower score is better)
                    //store the entered information into the userArray
                    currentUserStored = true;
                    console.log("storing account: " + JSON.stringify(userArray[i]));
                    result.innerHTML = "Registration successful";
                    result.innerHTML += JSON.stringify(userArray[i]);
                }
            }//end loop

            if (!currentUserStored) {
                //and we have already iterated through the list,
                console.error("No new accounts can be registered (we have reached our limit of 10 lucky players)");
                result.innerHTML = "No new accounts can be registered (we have reached our limit of 10 lucky players)";
            }
            localStorage.setItem("USERARRAY", JSON.stringify(userArray));
            //update the entire localstorage userArray
        } //end if the account is NOT a duplicate
    } else {
        //if input is invalid 
        console.warn("invalid registration input, account will not be stored");
        result.innerHTML = "invalid registration input, account will not be stored";
    }
}


//ADMIN functions
function viewUsers() {
    alert("current records: " + JSON.stringify(localStorage));
    alert("session Storage so far is " + JSON.stringify(sessionStorage));
}

function eraseUsers() {
    localStorage.removeItem("USERARRAY");
    console.log("deleting all records");
    checkIfMaxUsersReached();
    updateBanner(); //from banner.js
}

function logout() {
    sessionStorage.removeItem("loggedInEmail");
    console.log("logging you out");
    updateBanner(); //from banner.js
}




