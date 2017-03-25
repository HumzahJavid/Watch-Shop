
function validation(){
	var visitorUsername = document.getElementById("usernameInput").value;
	var visitorPassword = document.getElementById("passwordInput").value;
	var visitorEmail = document.getElementById("emailInput").value;
	var visitorNumber = document.getElementById("numberInput").value;
	var validInputLength = validateInput(visitorUsername, visitorPassword, visitorEmail, visitorNumber);

	if (validInputLength) {
		result.innerHTML = "";
		register(); 
		//run the register via AJAX
	} else {
		result.innerHTML = "invalid registration input, account will not be stored";
	}
 
}

	
function validateUsernameLength(username) {
    var length = username.length;
	console.log("username :" + length);
    if (length == 0) {
        console.warn("username is missing");
        document.getElementById("usernameError").innerHTML = "*username is missing";
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
	
	console.log("password ERROr:" + length);
    if (length === 0) {
        console.warn("password is missing");
        document.getElementById("passwordError").innerHTML = "*password is missing";
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
	
	console.log("email :" + length);
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
	
	console.log("number :" + length);
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
	console.log(validUserLength + " " + validPassLength + " " + validEmailLength + " " + validNumberLength);
    if (!validUserLength || !validPassLength || !validEmailLength || !validNumberLength) {
        return false;
    } else {
        return true;
    }
}

function register() {

		
	var request = new XMLHttpRequest();
			
	request.onload = function() {
		
		if(request.readyState == 4 && request.status == 200) {
			var responseData =  request.responseText;
			document.getElementById("result").innerHTML = responseData;
			}
			
		else {
			document.getElementById("result").innerHTML = "Error communicating with server: ";
		}
		
		}
		var username = document.getElementById("usernameInput").value;
		var email = document.getElementById("emailInput").value;
		var Password = document.getElementById("passwordInput").value;
		var number = document.getElementById("numberInput").value;
		
		request.open("POST", "registerCustomer.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		request.send("username=" + username + "&email=" + email + "&password=" + Password + "&number=" + number);
}

