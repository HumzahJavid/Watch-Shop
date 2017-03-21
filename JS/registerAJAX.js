function register() {

	
		/*var username = document.getElementById("usernameInput").value;
		var email = document.getElementById("emailInput").value;
		var Password = document.getElementById("passwordInput").value;
		var number = document.getElementById("numberInput").value;
		alert(username);
		alert(email);
		alert(Password);
		alert(number);
		*/
		
		var request = new XMLHttpRequest();
			document.getElementById("result").innerHTML = (request.status + " " + request.statusText);
		
	request.onload = function() 
	//document.getElementById("result").innerHTML = (request.status + " status< text>" + request.statusText);
		
		alert("we have readyState/ONLOAD change");
		if(request.readyState == 4 && request.status == 200) {
			var responseData = request.responseText;
			alert("response data = " + responseData);}
		
		else {
			document.getElementById("result").innerHTML = "Error communicating with server: ";
		}
		
		var username = document.getElementById("usernameInput").value;
		var email = document.getElementById("emailInput").value;
		var Password = document.getElementById("passwordInput").value;
		var number = document.getElementById("numberInput").value;
		
		request.open("POST", "registerCustomer.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		alert(request);
		
		request.send("username=" + username + "&address=" + email + "&password=" + Password + "&number=" + number);
	
	}
	}

