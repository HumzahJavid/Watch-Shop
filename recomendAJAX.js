window.addEventListener("load", recommendProduct);

function recommendProduct() {
	var request = new XMLHttpRequest();
			
	request.onload = function() {
		if(request.readyState == 4 && request.status == 200) {
			var responseData =  request.responseText;
			var recommendation = responseData.split("*");
			for (i = 0; i < (recommendation.length - 1); i++) {
			
			var recommendedProduct = JSON.parse(recommendation[i]);
			console.log(recommendedProduct.productID);
			console.log(recommendedProduct.name);
			console.log(recommendedProduct.price);
			console.log(recommendedProduct.quantity);
			console.log(recommendedProduct.url);
			console.log(recommendedProduct.keyword);
			
		
		
			var productID = recommendedProduct.productID; 
			var name = recommendedProduct.name;
			var price = recommendedProduct.price;
			var quantity = recommendedProduct.quantity;
			var url = recommendedProduct.url;
			var keyword = recommendedProduct.keyword;
			var infourl = url.replace("product", "info");
			var ID = recommendedProduct._id.$id;
			
			document.getElementById("recommend").innerHTML += '<div class="grid_element">' + name +
        '<img id="image99" style="width:100%;height:100%" onmouseover="this.src = \''+infourl+'\'" onmouseout="this.src = \''+url+'\'" alt="Another image" src="'+url+'">'+
		 
		 
		'price = £'+price+' quantity = '+ quantity+
		' <button class="CMSButton" onclick=\'addToBasket("'+ID+'", "'+name+'", "'+productID+'")\'><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">'+
        '<i class="fa fa-plus"></i> <i class="fa fa-shopping-cart"></i>'+
		'</button>' +
			'</div>'; }
		} else {
			document.getElementById("recommend").innerHTML = "Error communicating with server: ";
		}
	} //end onload
		
	
	request.open("POST", "recomendAJAX.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	request.send();
}

