<?php

include 'Api.php';

$api = new Api;
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
    <title>Categories</title>
</head>
<body class="bg-dark">
<div class="container">
    <div class="row">
        <?php
        foreach ($api->getProductCategories() as $category) {
            ?>
            <div class="col-3 mt-1 mb-1 py-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="productsByCategory.php?category=<?php echo $category; ?>"
                               class="btn btn-warning text-center mx-auto"><?php echo $category; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>

