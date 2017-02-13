<?php
//Include the PHP functions to be used on the page 
/* in common.php outputBannerNavigation($pageName) ..."<font size= 5> <b> $pageName </b></font>";
  if font size = 5 and banner in test css margin top = 0 px then it looks perfect, else if its 6 or 7 margin needs to be adjusted.
  currently newpage is in different banner pos due to overridden CSS? */
include('common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - newPage");
outputBodyTag();
?>

<button type="button" class="cartButton" onclick="plusDivs(-1)">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <i class="fa fa-shopping-cart"></i></span> Shopping Cart
</button>
<button type="button" class="cartButton">

    <i class="fa fa-volume-off" aria-hidden="true"></i> Mute
</button>

<script>
    function onclicky() {
        alert("clicky click clicker");
    }
</script>
<?php
outputBannerNavigation("Newpage");
?>


<!-- button css -->
<style>
    .cartButton {
        display: inline-block;
        padding: 6px 12px;
        float: right;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 0.5px solid;
        border-color: #ccc;
        border-radius: 5px;

        color: #333;
        background-color: #fff;
        padding: 5px 10px;
        font-size: 19px;
        line-height: 1.5;}

    button:hover {
        color: #333;
        background-color: #e6e6e6;
        /*border-color: #adadad;*/
    }
</style>
<!--<button type="button" class="cartButton">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
         <i class="fa fa-shopping-cart"></i></span> Shopping Cart
     </button>-->

<!-- Contents of the page -->
<div id="content">
    <p>Just a new page.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum purus nibh, et tempus sapien elementum ultrices. Quisque turpis lectus, accumsan non efficitur non, dignissim vel dolor. Suspendisse id augue est. Nulla sed consequat tellus, eget elementum tortor. Vivamus tempus enim eu nisi dapibus condimentum. Morbi placerat pellentesque tristique. In rutrum est sit amet nibh auctor, quis varius risus tristique. Aliquam in condimentum mi, at porta libero. Quisque congue dolor metus, et elementum urna fermentum nec. Aenean non blandit velit. Phasellus tincidunt sed est non blandit. Ut consequat sed lacus in aliquet. </p>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <button type="button" class="cartButton" onclick="onclicky()">
        <i class="fa fa-shopping-cart"></i></span> Shopping Cart
    </button>

    <button type="button" class="cartButton" id="mutebutton" onclick="mutethevid()">
        <i class="fa fa-volume-off" aria-hidden="true"></i> Mute
    </button>
    <script>
        function mutethevid() {
            var vid = document.getElementById("bgvid");


            if (vid.muted) {
                vid.muted = false;
                document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-off" aria-hidden="true"></i> Mute';

            } else {
                document.getElementById("mutebutton").innerHTML = '<i class="fa fa-volume-up" aria-hidden="true"></i> Unmute';
                vid.muted = true;
            }
        }
    </script>








    <!-- MANUAL BASIC SLIDESHOW
    
    <img class="mySlides" src="images/slide/1.jpg">
<img class="mySlides" src="images/slide/2.jpg">
<img class="mySlides" src="images/slide/3.jpg">
<img class="mySlides" src="images/slide/4.jpg">
<a class="w3-btn-floating w3-display-left" onclick="changeSlide(-1)">&#10094</a>
 <a class="w3-btn-floating w3-display-right" onclick="changeSlide(1)">&#10095;</a>
 
<a class="w3-btn-floating w3-display-left" onclick="changeSlide(-1)">&#187</a>
 <a class="w3-btn-floating w3-display-right" onclick="changeSlide(1)">&#171;</a>
<script>
var slideIndex = 1;
showSlide(slideIndex);

function changeSlide(n) {
 showSlide(slideIndex += n);
}

function showSlide(n) {
 var i;
 var x = document.getElementsByClassName("mySlides");
 alert(n + " " + JSON.stringify(x.length));
 if (n > x.length) {slideIndex = 1} 
 if (n < 1) {}; 
 if (n < 1) {
     alert("n = " + n + " slide index" + slideIndex)
     slideIndex = x.length
 }
 for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
 }
 x[slideIndex-1].style.display = "block";  
}
</script> 
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    -->


    <style>

        .dot {
            cursor:pointer;
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: white;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .activeDot, .dot:hover {
            background-color: #717171;
        }


        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

    </style>


    <style>
        /*
        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}*/
    </style>
    <body>

        <div class="w3-container">
            <h2>Slideshow Indicators</h2>
            <p>An example of using buttons to indicate how many slides there are in the slideshow, and which slide the user is currently viewing.</p>
        </div>

        <?php
        $directory = "images/slide/";
        $filecount = 0;
        $files = glob($directory . "*.jpg");
        if ($files) {
            $filecount = count($files);
        }
        ?>


        <div class="slideshowContainer" style="width:96%">
            <!-- <div class="w3-content w3-display-container" style="max-width:800px"> OLD -->
            <?php
            dynamicSlides($filecount);
            ?>
            <!--
                        <img class="mySlides" src="images/slide/1.jpg" style="width:100%">
            <img class="mySlides" src="images/slide/2.jpg"style="width:100%">
            <img class="mySlides" src="images/slide/3.jpg"style="width:100%">
            <img class="mySlides" src="images/slide/4.jpg"style="width:100%">
            -->

            <a class="prev" onclick="plusDivs(-99)">&#10094;</a>
            <a class="next" onclick="plusDivs(99)">&#10095;</a>
        </div>
        <!--
<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
        -->			
        <?php dynamicBullets($filecount); ?>
</div>
</div>

<script>
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
        // var dots = document.getElementsByClassName("demo"); OLD
        var dots = document.getElementsByClassName("dot");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            //alert("using arrows n < 1 = " + n);
            slideIndex = x.length

            //alert("slideIndex = " + slideIndex);
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            // dots[i].className = dots[i].className.replace(" w3-white", ""); OLD
            dots[i].className = dots[i].className.replace(" activeDot", "");
        }
        x[slideIndex - 1].style.display = "block";
        //dots[slideIndex - 1].className += " w3-white"; OLD
        dots[slideIndex - 1].className += " activeDot";
    }


</script>
<style>


    video#bgvid {
        position: fixed; right: 0; bottom: 0;
        min-width: 100%; min-height: 100%;
        width: auto; height: auto; z-index: -100;
        background: url(polina.jpg) no-repeat;
        background-size: cover;
    }
</style>

<video autoplay loop poster="images/loading.jpg" id="bgvid">		 
    <source src="images/background5.mp4" type="video/mp4">
</video>




<?php
outputFooter();
//Output the footer
?>








