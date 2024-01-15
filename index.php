<?php

include 'navbar.php';
include 'Api.php';

$api = new api;
$productsData = $api->getAllProduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Game Store</title>
</head>
<body>
<div id="carouselExampleDark" class="carousel carousel-dark slide h-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner h-50">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="<?php echo  $productsData['products'][0]['thumbnail']?>" class="d-block w-100 h-100"  alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h5>Days Gone</h5>
                <p>Players assume the role of Deacon St. John, a former bounty hunter struggling to survive in a post-apocalyptic world filled with zombie-like creatures called Freaks. Though players are surrounded by death and danger on all sides, the world that they get to explore feels as though it's truly alive, which can encourage players to take risks when they probably shouldn't..</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="<?php echo  $productsData['products'][1]['thumbnail']?>" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h5>Days Gone</h5>
                <p>Players assume the role of Deacon St. John, a former bounty hunter struggling to survive in a post-apocalyptic world filled with zombie-like creatures called Freaks. Though players are surrounded by death and danger on all sides, the world that they get to explore feels as though it's truly alive, which can encourage players to take risks when they probably shouldn't..</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo  $productsData['products'][2]['thumbnail']?>" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h5>Days Gone</h5>
                <p>Players assume the role of Deacon St. John, a former bounty hunter struggling to survive in a post-apocalyptic world filled with zombie-like creatures called Freaks. Though players are surrounded by death and danger on all sides, the world that they get to explore feels as though it's truly alive, which can encourage players to take risks when they probably shouldn't..</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</body>
</html>