function muteButtonClick() {
    var vid = document.getElementById("bgvid");
    
    if (vid === null || vid.muted === null) {
        document.getElementById("mutebutton").innerHTML = '<i class="fa fa-file-video-o" aria-hidden="true"></i> Missing A/V';

    } else {
        if (vid.muted) {
            vid.muted = false;
            document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-off" aria-hidden="true"></i> Mute';
        } else {
            document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-up" aria-hidden="true"></i> Unmute';
            vid.muted = true;
        }
    }
}