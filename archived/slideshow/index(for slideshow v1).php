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
    <p> This page will be your guide for this website. You can play Buy watches on this website and view your purchase history. </p>

    <p> On the Registration page you can create an account which will be used to save your purchase.</p>

    <p> On the Login page you can login to your account you must do this before attempting to purchase a watch else....</p>   

    <p> On the Newpage page, this will probably be the product page. This page will have CMS content if an admin is logged in. 
        e.g. view product (maybe all at once including extra details), add product, edit product info, manage customer order </p>

             <h2>Slideshow Indicators</h2>
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

        <a class="prev" onclick="plusDivs(-99)">&#10094;</a>
        <a class="next" onclick="plusDivs(99)">&#10095;</a>
    </div>
    
    <div id="dots">
        <?php dynamicBullets($filecount); ?>
    </div>
		</div> <!-- end content --> 
                <style>
                
                
        

    </style>
    
<script src="slideShow.js">
</script>
<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>

