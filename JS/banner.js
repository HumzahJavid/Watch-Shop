function updateBanner(loggedInEmail) {
    var banner = document.getElementById("banner");
    if (loggedInEmail === null) {
        banner.className = "notLoggedIn";
        banner.innerHTML = ("You are not logged in. Your basket will not be saved");
    } else {
        banner.className = "loggedIn";
        banner.innerHTML = ("Logged In: " + loggedInEmail);
    }
}

