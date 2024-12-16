<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/Darkwater_Fins/">
    <?php include_once './app/components/bootStrapAndFontLink.php'; ?>
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/itemCard.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once './app/components/header.php' ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('FishFood', ['Home', 'FishFood']);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between mb-3 top-right-content" style="padding-right: 30px;">
                    <div class="w-100" style="display: flex; justify-content: flex-end;">
                        <select class="form-select w-25" aria-label="Default select example" style="border-radius: 0;">
                            <option value="1">Sort by latest</option>
                            <option value="2">Sort by oldest</option>
                            <option value="3">Sort by</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-3 col-sm-6">
                        <div class="card">
                            <img src="https://i.imgur.com/uePdyIl.jpg" alt="API Betta Food" class="card-img-top">
                            <div class="icon-overlay">
                                <i class="bi bi-cart-plus"></i>
                                <i class="bi bi-link"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">API Betta Food</h5>
                                <p class="card-text">Formulated to enhance Betta fish colors and support overall health.</p>
                                <div class="fish-price">$6.99</div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6">
                        <div class="card">
                            <img src="https://i.imgur.com/9t7jO78.jpg" alt="New Life Spectrum Betta 70" class="card-img-top">
                            <div class="icon-overlay">
                                <i class="bi bi-cart-plus"></i>
                                <i class="bi bi-link"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">New Life Spectrum Betta 70</h5>
                                <p class="card-text">High-quality pellets that improve Betta fish color, growth, and vitality.</p>
                                <div class="fish-price">$12.99</div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6">
                        <div class="card">
                            <img src="https://i.imgur.com/0TNt6XE.jpg" alt="TetraBetta" class="card-img-top">
                            <div class="icon-overlay">
                                <i class="bi bi-cart-plus"></i>
                                <i class="bi bi-link"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">TetraBetta</h5>
                                <p class="card-text">Well-balanced food that helps Betta fish thrive, supporting health and vibrant colors.</p>
                                <div class="fish-price">$4.99</div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 col-sm-6">
                        <div class="card">
                            <img src="https://i.imgur.com/0TNt6XE.jpg" alt="TetraBetta" class="card-img-top">
                            <div class="icon-overlay">
                                <i class="bi bi-cart-plus"></i>
                                <i class="bi bi-link"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">TetraBetta</h5>
                                <p class="card-text">Well-balanced food that helps Betta fish thrive, supporting health and vibrant colors.</p>
                                <div class="fish-price">$4.99</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" data-page="1">1</a></li>
                            <li class="page-item"><a class="page-link" data-page="2">2</a></li>
                            <li class="page-item"><a class="page-link" data-page="3">3</a></li>
                            <li class="page-item"><a class="page-link" data-page="4">4</a></li>
                            <li class="page-item"><a class="page-link" data-page="5">5</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php include_once  './app/components/footer.php'; ?>
    <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
</body>
</html>