<?php
//Include the PHP functions to be used on the page 

include('common.php');
//outputs a BodyTag with onload 
//Output header and navigation 
outputHeader("Group 22 Watch Website - product");
outputBodyTag();
outputBannerNavigation("Watch Collections");
?>
<!-- Contents of the page -->
<div id="content"">
<h1> Recommedations </h1>

<script src="recomendAJAX.js"></script>
<div id="recommend"> </div>

   <h1> Our collection of the <em>finest</em> watches we have to offer </h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<style>
	#container {
		width:100%;
	}
	</style>
	<!-- increased width from default 80% to 100%, to allow for
	easier viewing of the products -->
<?php
$mongoClient = new MongoClient();
//Connect to MongoDB

$db = $mongoClient->ecommerce;
//Select a database

$Products = $db->products->find();
//find all products

$index = 0;
foreach($Products as $pro){
	$ID = $pro['_id'];
	$productID = $pro['productID'];
	$productName = $pro['name'];
	$productPrice = $pro['price'];
	$productQuantity = $pro['quantity'];
	$url = $pro['url'];
	
	$index += 1;
	$imageID = ('image' . $index); 
	$infourl = str_replace("product","info",$url);
 
 echo '<div class="grid_element">
	      '. $productName .'
         <img id="'. $imageID .'" src="' . $url . '" style="width:100%;height:100%" onmouseover="this.src = \''. $infourl .'\'" onmouseout="this.src = \''. $url .'\'" alt="Another image">
		 price = £'. $productPrice .' quantity = '. $productQuantity .' <button class="CMSButton" onclick=\'addToBasket("' . $ID . '", "' . $productName . '", "' . $productID . '", "' . $productPrice .'")\'><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <i class="fa fa-plus"></i> <i class="fa fa-shopping-cart"></i>
		</button>
                
    </div>';
}            
$mongoClient->close();
?>	
</div>

<?php
video("Watch");
//chooses video (using filename ) and uses it as animated background
outputFooter();
//Output the footer
?>






