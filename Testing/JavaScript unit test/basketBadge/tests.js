function resetBasketCount(){
	sessionStorage.removeItem("basketCount");
	cartBadge.innerHTML = "";
}
		
QUnit.test( "Test loadBasketBadge (sessionStorage['basketCount'] = undefined) " , function( assert ) {
	assert.equal(sessionStorage["basketCount"], undefined, "sessionStorage['basketCount'] = undefined");
	loadBasketBadge();
	assert.equal(cartBadge.innerHTML, "0", "cartBadge set to 0(takes into account undefined key)");
	resetBasketCount();
});

QUnit.test( "Test loadBasketBadge (sessionStorage['basketCount'] = 0) " , function( assert ) {
	sessionStorage["basketCount"] = 0;
	assert.equal(sessionStorage["basketCount"], 0, "sessionStorage['basketCount'] = 0");
	loadBasketBadge();
	assert.equal(cartBadge.innerHTML, "0", "cartBadge set to 0");
	resetBasketCount();
});

QUnit.test( "Test loadBasketBadge (sessionStorage['basketCount'] = 3) " , function( assert ) {
	sessionStorage.basketCount = 3;
	assert.equal(sessionStorage["basketCount"], 3, "sessionStorage['basketCount'] = 3");
	loadBasketBadge();
	assert.equal(cartBadge.innerHTML, "3", "cartBadge set to 3");
	resetBasketCount();
});



