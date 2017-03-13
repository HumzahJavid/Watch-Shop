<html>
    <head>
        <title>Basket Demo</title>
        <link rel="stylesheet" type="text/css" href="/test.css">
        <script src="/JS/basket.js"></script>
    </head>
    <body>
        <h1>Shopping Website</h1>

        <!-- PHP loads product information -->        
        <?php
        //Connect to MongoDB and select database
        $mongoClient = new MongoClient();
        $db = $mongoClient->ecommerce;
        
        //Find all products
        $products = $db->products->find();
        //Output results onto page
        if($products->count() > 0){
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Add basket</th></tr>';
            foreach ($products as $document) {
                echo '<tr>';
                echo '<td>' . $document["_id"] . "</td>";
                echo '<td>' . $document["name"] . "</td>";
				echo '<td>' . $document["quantity"] . "</td>";
                echo '<td><button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '", "' .$document["quantity"].'")\'>';
                echo '<img class="addButtonImg" src="/images/addToBasket.png"></button></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        //Close the connection
        $mongoClient->close();
        ?>
        
        <!-- Displays contents of basket -->    
        <h2>Basket</h2>
        <div id="basketDiv"></div>
    
    </body>
</html>
        
