<?php
//Include the PHP functions to be used on the page 
include('../common.php');

if (!isset($_SESSION['loggedInAdminEmail'])){
	header('Refresh: 3, url = /CMS/CMSLoginPage.php');
	echo "<h1> Please login </h1>";
	return;
}
//If the admin is not logged in, redirect to CMS login page
?>

<?php
//Output header and navigation 
outputHeader("Group 22 Watch Website - CMS");
outputBodyTag();
outputBannerNavigation("CMS");
?>

<!-- Contents of the page -->
<div id="content">
    <p>THE CMS</p>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">	
	
	ADD Product
			<br>
			<form action="/CMS/addProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="name" placeholder="Product Name">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="price" placeholder="Product Price">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="quantity" placeholder="Product Quantity">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="url" placeholder="Product Image URL">
			<br>
			<input style="width:400px;height:20px" id="Search" type="text" name="keyword" placeholder="Keywords">
			<br>
			<button type="submit" class="CMSButton" value="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-plus"></i></span>  Add Product
		</button> 
	</form>
	        <br><br>
			VIEW Product/s
			<br>
			<form action="/CMS/viewProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="productID" placeholder="Product ID">
	        <br>
		    <button type="submit" class="CMSButton" value=""> 	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-times"></i></span> View Product
		</button>
		</form>
		
		<br><br>
			EDIT Product
			<br>
						
			<form action="/CMS/editProduct.php" method="post">
			<input style="width:400px;height:20px" id="Search" type="text" name="productID" placeholder="Product ID">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="name" placeholder="Product Name">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="price" placeholder="Product Price">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="quantity" placeholder="Product Quantity">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="url" placeholder="Product Image URL">
			<br>
			<input style="width:400px;height:20px" id="Search" type="text" name="keyword" placeholder="Keywords">
			<br>
			<button type="submit" class="CMSButton" value="" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-pencil"></i></span> Edit Product
    </button>
	</form>
			<br>
			<br>
			DELETE Product/s
			<br>
			<form action="/CMS/deleteProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="productID" placeholder="Product ID">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="quantity" placeholder="Product Quantity">
			<br>
		 <button type="submit" class="CMSButton" onclick="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-times"></i></span> Delete Product
    </button>
	</form>
			<br>
			<br>
			VIEW Customer orders
			<br>
			
			<form action="/CMS/customer_order_management.php" method="post">
			<input style="width:400px;height:20px" id="Search" type="text" name="email" placeholder="Customer email">
			<br>
			<button type="submit" class="CMSButton" value="" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-list"></i></span> View Customer Order
    </button>
	</form>
	<br> <br>
	<form action ="/CMS/logoutCMS.php" method="post">
		<button type="submit" class="CMSButton">
		Logout
		</button>
	</form>	
			
</div> <!-- end content --> 


<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>
