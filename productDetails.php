<?php

include "Api.php";

$api = new api;
$product = $api->getProductById($_GET['productId']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include 'navbar.php';
    ?>
    <title><?php echo $product['title']; ?></title>
</head>
<body class="bg-dark">
<div class="container">
    <div class="row mt-5">
        <div class="card text-center">
            <div class="card-header">
                Featured
            </div>
            <img src="<?php echo $product['thumbnail']; ?>" class="card-img-top"
                 alt="...">
            <div class="card-body text-dark">
                <h5 class="card-title"><?php echo $product['title']; ?></h5>
                <h5 class="card-rating"><?php echo $product['rating']; ?></h5>
                <p class="card-text"><?php echo $product['category']; ?></p>
                <p class="card-text"><?php echo $product['description']; ?></p>
                <span class="price"><?php echo '$' . $product['price']; ?></span>
                <a href="#" class="btn btn-warning">Buy Now</a>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
