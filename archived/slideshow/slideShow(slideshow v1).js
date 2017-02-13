
var slideShowTimer = setInterval(function () {
    plusDivs(1);
}, 2000);

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    if (n === 99) {
        clearInterval(slideShowTimer);	
        //clear the timer 
        setTimeout(function () {
            //{delay for... 
            slideShowTimer = setInterval(function () {
                plusDivs(1);
            }, 2000);
            //resume slide show at a pace of a picture every 2 seconds
            //... 2 seconds} 
        }, 2000);

    } else if (n === -99) {
        clearInterval(slideShowTimer);
        //clear the timer 
        setTimeout(function () {
            //{delay for... 
            slideShowTimer = setInterval(function () {
                plusDivs(-1);
            }, 2000);
            //resume slide show at a pace of a picture every 2 seconds
            //... 2 seconds} 
        }, 2000);

    } else {
        showDivs(slideIndex += n);
    }
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" activeDot", "");
    }
    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " activeDot";
}

			