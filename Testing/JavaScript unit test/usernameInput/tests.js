QUnit.test( "Test validateUsernameLength('humzah')", function( assert ) {
		assert.strictEqual(validateUsernameLength("humzah"), true, "username is valid");
	});
	
QUnit.test( "Test validateUsernameLength('')", function( assert ) {
	assert.strictEqual(validateUsernameLength(""), false, "username is empty");
});