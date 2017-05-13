QUnit.test( "Test validateInput 'testuser1, 1234, t@a, 000'" , function( assert ) {
		assert.strictEqual(validateInput("testuser1", "1234", "t@a", "000"), true, "all values are valid/not empty");
	});
	
QUnit.test( "Test validateInput '4 empty strings'", function( assert ) {
	assert.strictEqual(validateInput("", "", "", ""), false, "One or more values are invalid/empty");
});
