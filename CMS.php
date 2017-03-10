<?php
//Include the PHP functions to be used on the page 
include('common.php');
//outputs a BodyTag with onload 
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
			<form action="addProduct.php" method="post">
			 <input style="width:400px;height:20px" id="Search" type="text" name="ID" placeholder="Product ID">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="name" placeholder="Product Name">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="price" placeholder="Product Price">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="quantity" placeholder="Product Quantity">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="url" placeholder="Product Image URL">
			<br>
			<!--<button type="submit" value ="ADD Product" class="CMSButton">-->
			<!-- the value attribute is not being used, and the title tag is not valid for a button I've commented it out to demonstrate that it works without them, 
					we might be able to use the value attribute to make our form more efficient (which is what you were mentioning on Friday)-->
			<button type="submit" class="CMSButton" value="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-plus"></i></span>  Add Product
		</button> 
	</form>
	        <br><br>
			VIEW Product/s
			<br>
			<form action="ViewProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="_id" placeholder="Product ID">
	        <br>
		    <input type="submit" class="CMSButton" value=""> 	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-times"></i></span> View Product
		</button>
		</form>
		
		<br><br>
			EDIT Product
			<br>
						
			<form action="editProduct.php" method="post">
			<input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product ID">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Name">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Price">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Quantity">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Image URL">
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
			
			<form action="deleteProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product ID">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Quantity">
			<br>
		 <button type="button" class="CMSButton" onclick="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-times"></i></span> Delete Product
    </button>
	</form>
			<br>
			<br>
			VIEW Customer orders
			<br>
			
			<form action="viewCustomerOrder.php" method="post">
			<input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product ID">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Name">
	        <br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Price">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Quantity">
			<br>
	        <input style="width:400px;height:20px" id="Search" type="text" name="search" placeholder="Product Image URL">
			<br>	
			<button type="submit" class="CMSButton" value="" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-list"></i></span> View Customer Order
    </button>
	</form
			
			
</div> <!-- end content --> 


<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>





