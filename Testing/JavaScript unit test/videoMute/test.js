function videoandButtonUnmuted(vid){
	vid.muted = false;
    document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-off" aria-hidden="true"></i> Mute';
        
}

function videoandButtonMuted(vid){
	vid.muted = true;
    document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-up" aria-hidden="true"></i> Unmute';
        
}

QUnit.test("Test muteButtonClick (video currently unmuted) ", function(assert) {
	videoandButtonUnmuted(bgvid);
	//video unmuted
	muteButtonClick();
	assert.equal(mutebutton.innerHTML, "<i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i> Unmute", "banner text = current button: unmute, video muted");
	assert.equal(bgvid.muted, true, "video is muted");
});

QUnit.test("Test muteButtonClick (video currently muted) ", function(assert) {
	videoandButtonMuted(bgvid);
	//video muted
	muteButtonClick();
	assert.equal(mutebutton.innerHTML, "<i class=\"fa fa-volume-off\" aria-hidden=\"true\"></i> Mute", "banner text = current button: mute, video unmuted");
	assert.equal(bgvid.muted, false, "video is unmuted");
});
