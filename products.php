<?php
//Include the PHP functions to be used on the page 

include('common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - product");
outputBodyTag();
outputBannerNavigation("Watch Collections");
?>
<!-- changes made to this page 
the container is split into two parts so that I can have the content section (the text) stretched across entire screen
and have the header and footer at 80 % in the center
-->

<!-- Contents of the page -->
<div id="content">

   <h1> Our collection of the <em>finest</em> watches we have to offer </h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!--<script src="productImages.js">
    </script>-->
		<style>
	#container {
	width:100%;
	}
	.grid_element {
   width: 400px;
	 height:400px;
	}
	
  </style>
    <div class="grid_element">
	Hublot
        <img id="image1" src="images/product/1.png" style="width:100%;height:100%" onmouseover="swapImages(1)" onmouseout="restoreImages(1)" alt="Another image">
    </div>
    <div class="grid_element">
	Breitling
        <img id="image2" src="images/product/2.png" style="width:100%;height:100%" onmouseover="swapImages(2)" onmouseout="restoreImages(2)" alt="Another image">
    </div>
    <div class="grid_element">
	Cartier
        <img id="image3" src="images/product/3.png" style="width:100%;height:100%" onmouseover="swapImages(3)" onmouseout="restoreImages(3)" alt="Another image">
    </div>
    <div class="grid_element">
	Chanel
		<img id="image4" src="images/product/4.png" style="width:100%;height:100%" onmouseover="swapImages(4)" onmouseout="restoreImages(4)" alt="Another image">
    </div>
    <div class="grid_element">
	Hublot
        <img id="image5" src="images/product/5.png" style="width:100%;height:100%" onmouseover="swapImages(5)" onmouseout="restoreImages(5)" alt="Another image"> 
    </div>
    <div class="grid_element">
	IWC
        <img id="image6" src="images/product/6.png" style="width:100%;height:100%" onmouseover="swapImages(6)" onmouseout="restoreImages(6)" alt="Another image">
    </div>
    <div class="grid_element">
	Maurice Lacroix
        <img id="image7" src="images/product/7.png" style="width:100%;height:100%" onmouseover="swapImages(7)" onmouseout="restoreImages(7)" alt="Another image">
    </div>
    <div class="grid_element">
	Rolex
        <img id="image8" src="images/product/8.png" style="width:100%;height:100%" onmouseover="swapImages(8)" onmouseout="restoreImages(8)" alt="Another image">  
    </div>
    <div class="grid_element">
	Tag Hewer
        <img id="image9" src="images/product/9.png" style="width:100%;height:100%" onmouseover="swapImages(9)" onmouseout="restoreImages(9)" alt="Another image">
    </div>
	  <div class="grid_element">
	Zenith
        <img id="image10" src="images/product/10.png" style="width:100%;height:100%" onmouseover="swapImages(10)" onmouseout="restoreImages(10)" alt="Another image">
    </div>
	  <div class="grid_element">
	Omega
        <img id="image11" src="images/product/11.png" style="width:100%;height:100%" onmouseover="swapImages(11)" onmouseout="restoreImages(11)" alt="Another image">
    </div>
	  <div class="grid_element">
	G-Shock 
        <img id="image12" src="images/product/12.png" style="width:100%;height:100%" onmouseover="swapImages(12)" onmouseout="restoreImages(12)" alt="Another image">
	</div>
	    <script src="JS/products.js"></script>
</div>

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>






