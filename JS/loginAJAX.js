function detectEnterKey(id) {
    document.getElementById(id).onkeypress = function (e) {
        if (e.keyCode === 13) {
			login();
            return false;
        }
    };
}
detectEnterKey('loginPara');
//Allows user to press the enter key when typing in the registration text boxes 


var emailBanner = document.getElementById("emailInput").value;

function login() {
	var request = new XMLHttpRequest();
			
	request.onload = function() {
		if(request.readyState == 4 && request.status == 200) {
			var responseData =  request.responseText;
			if(responseData === "ok"){
                            document.getElementById("loginPara").innerHTML = "<h1> </h1>";
                            document.getElementById("loginFailure").innerHTML = "";//Clear error messages
							document.getElementById("logoutButton").innerHTML = '<form action ="/logout.php" method="post"> <button type="submit" class="button"> <a style="font-size : 29px;"/> Logout </a> </button> </form>';
							updateBanner(emailBanner);
			} else {
				document.getElementById("loginFailure").innerHTML = responseData; 
			}
		} else {
			document.getElementById("loginFailure").innerHTML = "Error communicating with server: ";
		}
	} //end onload
		
	var email = document.getElementById("emailInput").value;
	var Password = document.getElementById("passwordInput").value;
		
	request.open("POST", "loginCustomer.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	request.send("email=" + email + "&password=" + Password);
}

