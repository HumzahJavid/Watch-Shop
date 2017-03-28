//Globals#
window.onload = loadBasket;

//Displays basket in page.
function loadBasket(){
    //Get basket from local storage or create one if it does not exist
    var basketArray;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basketArray = [];
    }
    else {
        basketArray = JSON.parse(sessionStorage.basket);
    }

    var prodIDs = [];
    for(var i=0; i<basketArray.length; ++i){
        prodIDs.push({id: basketArray[i].id, name: basketArray[i].name, count: 1, productID: basketArray[i].productID});//Add to product array
    }
    //Add hidden field to form that contains stringified version of product ids.

    document.getElementById("hiddenInput").innerHTML = "<input type='hidden' name='prodIDs' value='" + JSON.stringify(prodIDs) + "'>";
	
    //Display number of products in basket

	document.getElementById("cartBadge").innerHTML = basketArray.length;
    window.scrollTo(0, 0);
}

//Adds an item to the basket
function addToBasket(prodID, prodName, productID){
    //Get basket from local storage or create one if it does not exist
    var basketArray;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basketArray = [];
    }
    else {
        basketArray = JSON.parse(sessionStorage.basket);
    }
    
    //Add product to basket
    basketArray.push({id: prodID, name: prodName, productID: productID});
    
    //Store in local storage
    sessionStorage.basket = JSON.stringify(basketArray);
	sessionStorage.basketCount = JSON.stringify(basketArray.length);
    
    //Display basket in page.
    loadBasket();      
}

//Deletes all products from basket
function emptyBasket(){
    sessionStorage.clear();
    loadBasket();
}
