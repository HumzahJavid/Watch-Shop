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
	<style> 
	.grid_element {
	  width: 200px;
	  height:200px;
	}
	
	.CMSButton {
	display: inline-block;
	float: none;
	/*font-weight: bold;*/
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
    line-height: 1.5;
	}
	
	</style>
	ADD Product
			<br>
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
			<button type="button" class="CMSButton" onclick="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-plus"></i></span> Add product
    </button>
	
			<br><br>
			VIEW Product/s
			<br>
			<form action="ViewProduct.php" method="post">
	        <input style="width:400px;height:20px" id="Search" type="text" name="_id" placeholder="Product ID">
	        <br>
		    <input type="submit" value="VIEW Product" title="VIEW" class="CMSButton"> 	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-times"></i></span>
		</form>
			<br>
			<br>
			EDIT Product
						<br>
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
			<button type="button" class="CMSButton" onclick="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-pencil"></i></span> Edit Product
    </button>
			<br>
			<br>
			VIEW Customer orders
			<br>
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
			<button type="button" class="CMSButton" onclick="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-list"></i></span> List Product
    </button>
			
			
</div> <!-- end content --> 


<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>





