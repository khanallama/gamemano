<?php
include 'Api.php';

$category = $_GET['category'];

$api = new Api;
$products = $api->getProductByCategory($category);

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
    <title><?php echo $category; ?></title>
</head>
<body class="bg-dark text-white">
<div class="container">
    <div class="row">
        <div class="col-md-9 mt-3">
            <div class="row">
                <?php
                foreach ($products['products'] as $product) {
                    ?>
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $product['thumbnail']; ?>" class="card-img-top"
                                 alt="...">
                            <div class="card-body text-dark">
                                <h5 class="card-title"><?php echo $product['title']; ?></h5>
                                <h5 class="card-rating"><?php echo $product['rating']; ?></h5>
                                <p class="card-text"><?php echo $product['category']; ?></p>
                                <p class="card-text"><?php echo $product['description']; ?></p>
                                <span class="price"><?php echo '$' . $product['price']; ?></span>
                                <a href="productDetails.php?productId=<?php echo $product['id']; ?>"
                                   class="btn btn-warning">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>



