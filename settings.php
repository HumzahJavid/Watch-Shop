<?php
//Include the PHP functions to be used on the page 
include('common.php');
 
//Output header and navigation 
outputHeader("Group 22 Watch Website - Settings");
outputBodyTag();
outputBannerNavigation("Settings");
?>
<div id="content">
    <p>On this page you can view your past orders and update your settings</p>

 
	<form action="/customer/customer_update_form.php">
	<input type="hidden"> </input> 
    <button class="CMSButton"> Edit customer details</button>
	</form>
	
	<form action="/customer/view-past-orders.php">
	<input type="hidden"> </input> 
    <button class="CMSButton"> View past orders</button>
	</form>
</div> <!-- end content -->

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>
