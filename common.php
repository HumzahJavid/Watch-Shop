<?php

function outputHeader($title) {
//Ouputs the header for the page
    echo '<!DOCTYPE html>
          <html>
          <head>
          <title id="title1">' . $title . '</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

          <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
          <!-- My animated favicon only works in firefox! -->
          <link rel="stylesheet" type="text/css" href="test.css">
          <!-- Link to external style sheet -->
          </head>';
}

/* Ouputs the banner and the navigation bar
  The selected class is applied to the page that matches the page name variable */

function outputBodyTag($functionOnLoad = "") {
    if ($functionOnLoad !== "") {
        echo '<body ';
        echo "onload = \"$functionOnLoad\">";
    } else {
        echo '<body>';
    }
}

function outputBannerNavigation($pageName) {
//Output banner and first part of navigation
    echo '<div id="container">
         <header>
         <font size=7> <b>' . $pageName . '</b></font>';
    addBannerButtons();
	searchbar();
    echo ' <ul id="navigationBar">';


//Array of pages to link to
    $linkNames = array("Homepage", "Login", "Register", "Watch Collections");
    $linkAddresses = array("index.php", "loginPage.php", "registrationPage.php", "products.php");

//Output navigation
    for ($x = 0; $x < count($linkNames); $x++) {
        echo '<li><a ';
		
		
        if ($linkNames[$x] == $pageName) {
            echo 'class="active" ';
        }
        echo 'href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a></li>';
    }
    echo '</ul>
          </header> <!-- end header -->
          <div id="banner" class="notLoggedIn">
          </div> <!-- end banner div -->
          <script src="JS/banner.js"></script>
          <script>updateBanner();</script>';
}

//Outputs closing body tag and closing HTML tag
function outputFooter() {
    echo '<div id="footer">
          <p> This website was made by Group 22 2017 </p>
          </div> <!-- end footer div -->
          </div> <!-- end container -->
          </body>
          </html>';
}

function dynamicSlides($nSlides) {
    for ($x = 1; $x <= $nSlides; $x++) {
        echo '<img class="mySlides" src="images/slide/' . $x . '.jpg" style="width:100%;height:500px">';
        /* echo '<img class="mySlides" src="images/slide/' . $x . '.jpg" style="width:100%">'; */
    };
}

function dynamicBullets($nSlides) {
    for ($y = 1; $y <= $nSlides; $y++) {
        //y will count for 1 to number of pictures in slide show folder to dynamically create dots
        echo '<span class="dot" onclick="currentDiv(' . $y . ')"></span>';
    };
}

function addBannerButtons() {

    echo'
    <button type="button" class="button" onclick="shoppingCartButtonClick()">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-shopping-cart"></i>
		<!--<li class="cartBadge">1</li>-->
		</span> Shopping Cart
    </button>
    <button type="button" class="button" id="mutebutton" onclick="muteButtonClick()">

        <i class="fa fa-volume-off" aria-hidden="true"></i> Mute
    </button>

    <script src="JS/videoMute.js">
    </script>
    ';
}

function video($file) {
    echo'
        <style>
            video#bgvid {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -100;
                background: url(polina.jpg) no - repeat;
                background-size: cover;
            }
        </style>    
    ';

    echo '
    <video autoplay loop preload = "auto" id = "bgvid" poster="images/videoMissing.png">
    <source src = "images/' . $file . '.mp4" type = "video/mp4">
    </video>';


}

function searchbar(){
	echo'<center>
	        <input style="width:400px;height:20px;float:top" id="Search" type="text" name="search" placeholder="What are you looking for?">
	        <input type="submit" value="GO" id="submit">	 
	
	     </center>';

	
}
?>