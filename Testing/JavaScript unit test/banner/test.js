function resetBanner(){
	banner.innerHTML = ("");
}
   

QUnit.test("Test updateBanner 'null' ", function(assert) {
    updateBanner(null);
	//sent when a user is logging out
	assert.equal(banner.className, "notLoggedIn", "banner className = notLoggedIn");
    assert.equal(banner.innerHTML, "You are not logged in. Your basket will not be saved", "banner text = ...not logged in...");
	resetBanner();
});

QUnit.test("Test updateBanner 'h@a' ", function(assert) {
    updateBanner("h@a");
	//sent when a user is logging in
	assert.equal(banner.className, "loggedIn", "banner className = loggedIn");
    assert.equal(banner.innerHTML, "Logged In: h@a", "banner text = Logged In: h@a");
	resetBanner();
});

QUnit.test("Test updateBanner logging in then out ", function(assert) {
    updateBanner("h@a");
	//sent when a user is logging in
	assert.equal(banner.className, "loggedIn", "banner className = loggedIn");
    assert.equal(banner.innerHTML, "Logged In: h@a", "banner text = Logged In: h@a");
	
	updateBanner(null);
	//sent when a user is logging out
	assert.equal(banner.className, "notLoggedIn", "banner className = notLoggedIn");
    assert.equal(banner.innerHTML, "You are not logged in. Your basket will not be saved", "banner text = ...not logged in...");
	resetBanner();
});
