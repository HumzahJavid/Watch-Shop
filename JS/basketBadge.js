function loadBasketBadge(){
	if (sessionStorage["basketCount"]) {
		document.getElementById("cartBadge").innerHTML = sessionStorage.basketCount;	
	} else {
		document.getElementById("cartBadge").innerHTML = "0";
	}
}