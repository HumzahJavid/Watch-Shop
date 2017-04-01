function createTestBanner() {
	//creates a banner div
	var elem = document.createElement("div");
    elem.className="notLoggedIn";
	elem.id = "banner"
	return elem;
}

QUnit.test("Test updateBanner 'h@a'", function(assert) {
	var elem = createTestBanner();
	
    updateBanner("h@a", elem);
	//sent when user logs in 
	//modified version of the updateBanner function for QUnit
	//original is in localhost/JS/banner.js
	//this version accepts a banner and returns it due to issues with line 2 in banner.js
	
    assert.equal(elem.className, "loggedIn", "user is logged in");
});

QUnit.test("Test updateBanner ''", function(assert) {
	var elem = createTestBanner();
	
    updateBanner(null, elem);
	//sent when a user is logging out
	//modified version of...
	
    assert.equal(elem.className, "notLoggedIn", "user is not logged in");
});