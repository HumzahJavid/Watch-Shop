var email = document.getElementById("emailInput").value;
function login() {
	var request = new XMLHttpRequest();
			
	request.onload = function() {
		
		if(request.readyState == 4 && request.status == 200) {
			var responseData =  request.responseText;
			if(responseData === "ok"){
                            document.getElementById("loginPara").innerHTML = "<h1> </h1>";
                            document.getElementById("loginFailure").innerHTML = "";//Clear error messages
							updateBanner(email);
                        }
                        else {
						document.getElementById("loginFailure").innerHTML = responseData; 
						}
						
			}
			
		else {
			document.getElementById("loginFailure").innerHTML = "Error communicating with server: ";
		}
		
		}
		var email = document.getElementById("emailInput").value;
		var Password = document.getElementById("passwordInput").value;
		
		request.open("POST", "loginCustomer.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		request.send("email=" + email + "&password=" + Password);
}

