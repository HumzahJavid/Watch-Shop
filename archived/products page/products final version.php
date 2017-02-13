<?php
//Include the PHP functions to be used on the page 

include('common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - product");
outputBodyTag();
outputBannerNavigation("Products");
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
	<?php
	
	function imageGrid($file) {
    /*echo"<div class=\"grid_element\"id=$file>";
    /*<img src="images/product/1.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/1.png'" onmouseout="this.src = 'images/product/1.png'" alt="Another image">
        <p>Description of above image</p>
    </div>
    ';*/
	}
	//imageGrid(image1);
	?>
		<style>
	#container {
	width:100%;
	}
	.grid_element {
		
		
		 width: 200px;
   height:200px;
  // display: inline-block;
  /* width: 200px; */
  /* height:200px; */
   /* For easier viewing of product page  */
   width: 400px;
	 height:400px;
	
	}
	
  </style>
    <div class="grid_element">
	<!-- swapImages(x) is method 1 -->
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
	
	<!-- php echo is working but not a complete method yet -->
	<?php 
	function test() {
		echo " 
		<img id=\"image4\" src=\"images/product/4.png\" style=\"width:100%;height:100%\" onmouseover=\"swapImages2('image4')\" onmouseout=\"restoreImages2('image4')\" alt=\"Another image\">
		";
	}
	test();
	?>
        <!--
		
																								swapImages2(ID) is method 2
		<img id="image4" src="images/product/4.png" style="width:100%;height:100%" onmouseover="swapImages2('image4')" onmouseout="restoreImages2('image4')" alt="Another image">
        -->
    </div>
    <div class="grid_element">
	Hublot
        <img id="image5" src="images/product/5.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/5.png'" onmouseout="this.src = 'images/product/5.png'" alt="Another image">
      
    </div>
    <div class="grid_element">
	IWC
        <img src="images/product/6.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/6.png'" onmouseout="this.src = 'images/product/6.png'" alt="Another image">
    </div>
    <div class="grid_element">
	Maurice Lacroix
        <img src="images/product/7.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/7.png'" onmouseout="this.src = 'images/product/7.png'" alt="Another image">
       
    </div>
    <div class="grid_element">
	Rolex
        <img src="images/product/8.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/8.png'" onmouseout="this.src = 'images/product/8.png'" alt="Another image">
        
    </div>
    <div class="grid_element">
	Tag Hewer
        <img src="images/product/9.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/9.png'" onmouseout="this.src = 'images/product/9.png'" alt="Another image">
        
    </div>
	  <div class="grid_element">
	Zenith
        <img src="images/product/10.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/10.png'" onmouseout="this.src = 'images/product/10.png'" alt="Another image">
    </div>
	  <div class="grid_element">
	Omega
        <img src="images/product/11.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/11.png'" onmouseout="this.src = 'images/product/11.png'" alt="Another image">
    </div>
    <div class="grid_element">
	G-Shock 
        <img src="images/product/12.png" style="width:100%;height:100%" onmouseover="this.src = 'images/info/12.png'" onmouseout="this.src = 'images/product/12.png'" alt="Another image">
    </div>
    <script>
	//method1
	function swapImages(x) {
		switch (x) {
			case 1: 
			document.getElementById("image1").src = "images/info/1.png";
			break;
			
			case 2:
			document.getElementById("image2").src = "images/info/2.png"
			break;
			
			case 3:
			document.getElementById("image3").src = "images/info/3.png"
			break;
			
		}
	}
	
	function restoreImages(x) {
			switch (x) {
			case 1: 
			document.getElementById("image1").src = "images/product/1.png";
			break;
			
			case 2:
			document.getElementById("image2").src = "images/product/2.png"
			break;
			
			case 3:
			document.getElementById("image3").src = "images/product/3.png"
			break;
			
		}
	}
	//method 2
	function swapImages2(ID) {
			   
        document.getElementById(ID).src = document.getElementById(ID).src.replace("product", "info");
        alert(document.getElementById(ID).src);
		};
		

    function restoreImages2(ID) {
		  document.getElementById(ID).src = document.getElementById(ID).src.replace('info', 'product');
        alert(document.getElementById(ID).src);
}
	</script>
        <!--
    <div class="grid_element" id="image1" >
        <img src="images/product/1.png" style="width:100%;height:100%" onmouseover="swapImages('image1')" onmouseout="restoreImages('image1')" alt="Another image">
        <p>Description of above image</p>
    </div> 
    <script>
    
    function swapImages(ID) {
                //alert(ID);
        document.getElementById(ID).innerHTML = document.getElementById(ID).innerHTML.replace('product', 'info');
      //  alert(document.getElementById(ID).innerHTML);
}

    function restoreImages(ID) {
                //alert(ID);
      document.getElementById(ID).innerHTML = document.getElementById(ID).innerHTML.replace('info', 'product');
     //   alert(document.getElementById(ID).innerHTML);
}
    </script>
    -->
    
<!--</div> <!-- end content 
<div id="container">
    <div id="footer">
        <p> This website was made by Group 22 2017 </p>
    </div> 
	</div>
</body>
</html>
<!-- end footer div -->
</div>

<?php
video("with music");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>

<!-- 
in common.php outputBannerNavigation($pageName) ..."<font size= 5> <b> $pageName </b></font>";
  if font size = 5 and banner in test css margin top = 0 px then it looks perfect, else if its 6 or 7 margin needs to be adjusted.
  currently newpage is in different banner pos due to overridden CSS? -->








