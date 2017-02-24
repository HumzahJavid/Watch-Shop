<?php
//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("Group 22 Watch Website - Home");
outputBodyTag();
outputBannerNavigation("Homepage");
?>

<!-- Contents of the page -->
<div id="content">

<p> Unique timepieces, the ultimate in precision instruments</p>

    <p> This page will be your guide for this website. You can play Buy watches on this website and view your purchase history. </p>

    <p> On the Registration page you can create an account which will be used to save your purchase.</p>

    <p> On the Login page you can login to your account you must do this before attempting to purchase a watch else your purchase will not be accepted</p>   

    <p> The product page. 
	
	<p> On the CMS page you can view product, add product, edit product info, manage customer order ... </p>

			 <p> Upcoming collection (with some already listed) </p>
        
		

    <?php
    $directory = "images/slide/";
    $filecount = 0;
    $files = glob($directory . "*.jpg");
    if ($files) {
        $filecount = count($files);
    }
    ?>

    <div class="slideshowContainer">
        <?php
        dynamicSlides($filecount);
        ?>

        <a class="prev" onclick="plusDivs(-99)"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <a class="next" onclick="plusDivs(99)"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>
    
    <div id="dots">
        <?php dynamicBullets($filecount); ?>
    </div>
		</div> <!-- end content --> 
    
<script src="JS/slideShow.js">
</script>
<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>

