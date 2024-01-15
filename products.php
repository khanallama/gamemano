<?php
include 'Api.php';

$api = new api;

$productsData = $api->getAllProduct();
$categories = $api->getProductCategories();

function filterProducts($productData, $searchQuery)
{
    return (
        stripos($productData['title'], $searchQuery) !== false ||
        stripos($productData['category'], $searchQuery) !== false ||
        stripos($productData['description'], $searchQuery) !== false
    );
}

// Sorting logic
if (isset($_POST['sort'])) {
    $sortBy = $_POST['sort'];
    if ($sortBy === 'low') {
        usort($productsData['products'], function ($productA, $productB) {
            return $productA['price'] - $productB['price'];
        });
    } elseif ($sortBy === 'high') {
        usort($productsData['products'], function ($productA, $productB) {
            return $productB['price'] - $productA['price'];
        });
    }
}

//logic of how many dara found by search
$searchQuery = '';
$foundResults = 0;
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    foreach ($productsData['products'] as $productData) {
        if (filterProducts($productData, $searchQuery)) {
            $foundResults++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Game Store</title>
    <?php
    include 'navbar.php';
    ?>
</head>
<body class="bg-dark text-white">
<div class="container">
    <div class="row">
        <div class="col-md-3 mt-3">
            <form id="searchForm" method="POST" action="">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="sort">Sort by:</label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="" <?php
                        if (isset($_POST['sort'])) {
                            echo ($sortBy == '') ? 'selected' : '';
                        }
                        ?>>Select
                        </option>
                        <option value="low" <?php
                        if (isset($_POST['sort'])) {
                            echo ($sortBy == 'low') ? 'selected' : '';
                        }
                        ?>>Price : Low to High
                        </option>
                        <option value="high" <?php
                        if (isset($_POST['sort'])) {
                            echo ($sortBy == 'high') ? 'selected' : '';
                        }
                        ?>>Price : High to Low
                        </option>
                    </select>
                </div>
                <div>
                    <label for="category"><strong>Categories</strong></label>
                    <ul style="list-style-type: none; padding: 0;">
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <li>
                                <input type="checkbox" name="categories[]"
                                       value="<?php echo $category; ?>" <?php echo (isset($_POST['categories']) && in_array($category, $_POST['categories'])) ? 'checked' : ''; ?>>
                                <label><?php echo $category; ?></label>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="row">
                    <label class="mb-2 mt-3" for="price"><strong>Price</strong></label>
                    <div class="col-md-6">
                        <input type="text" name="start_price" id="start_price"
                               value="<?php echo isset($_POST['start_price']) ? htmlspecialchars($_POST['start_price']) : ''; ?>"
                               class="form-control">
                    </div>
                    <div class="col-md-1 text-center mt-2">
                        <span class="fw-bold">-</span>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="end_price" id="end_price"
                               value="<?php echo isset($_POST['end_price']) ? htmlspecialchars($_POST['end_price']) : ''; ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-warning px-4">Apply Filters</button>
                </div>
            </form>
        </div>
        <div class="col-md-9 mt-3">
            <?php if (!empty($searchQuery)) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>Search Results for: <strong><?php echo htmlspecialchars($searchQuery); ?></strong></p>
                        <p><?php echo $foundResults; ?> results found</p>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <?php
                foreach ($productsData['products'] as $productData) {
                    if (filterProducts($productData, $searchQuery)) {
                        $priceFilter = true;
                        $categoryFilter = true;

                        if (isset($_POST['start_price']) && isset($_POST['end_price']) && !empty($_POST['start_price']) && !empty($_POST['end_price'])) {
                            $startprice = $_POST['start_price'];
                            $endprice = $_POST['end_price'];
                            $productPrice = (float)$productData['price'];
                            $priceFilter = ($productPrice >= $startprice && $productPrice <= $endprice);
                        }
                        if (isset($_POST['categories']) && !empty($_POST['categories'])) {
                            $selectedCategories = $_POST['categories'];
                            $productCategory = $productData['category'];
                            $categoryFilter = in_array($productCategory, $selectedCategories);
                        }
                        if ($priceFilter && $categoryFilter) {
                            ?>
                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?php echo $productData['thumbnail']; ?>" class="card-img-top"
                                         alt="...">
                                    <div class="card-body text-dark">
                                        <h5 class="card-title"><?php echo $productData['title']; ?></h5>
                                        <h5 class="card-rating"><?php echo $productData['rating']; ?></h5>
                                        <p class="card-text"><?php echo $productData['category']; ?></p>
                                        <p class="card-text"><?php echo $productData['description']; ?></p>
                                        <span class="price"><?php echo '$' . $productData['price']; ?></span>
                                        <a href="productDetails.php?productId=<?php echo $productData['id']; ?>"
                                           class="btn btn-warning">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('sort').addEventListener('change', function () {
        document.getElementById('searchForm').submit();
    });
</script>
</body>
</html>
