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
    <link rel="stylesheet" href="./public/css/sidebar.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include_once './app/components/header.php' ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('Aquarium', ['Home', 'Aquarium']);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3">
                <?php include_once './app/components/sidebar.php'; ?>
            </div>
            <!-- Main content -->
            <div class="col-9">
                <!-- Phần đầu với icons và dropdown -->
                <div class="d-flex justify-content-between mb-3 top-right-content " style="padding-right: 40px;">
                    <div class="icon-content">
                        <i class="bi bi-grid-3x3-gap-fill icon-right-content"></i>
                        <i class="bi bi-grid-3x3-gap-fill icon-right-content" style="color: #E9F6F7"></i>
                    </div>
                    <select class="form-select w-25 " aria-label="Default select example" style="border-radius: 0;">
                        <option value="1">Sort by lastest</option>
                        <option value="2">Sort by oldest</option>
                        <option value="3">Sort by </option>
                    </select>
                </div>
                <!-- chổ này là chổ render các card -->
                    <div class="row">
                    <div class="col col-md-4 col-sm-6">
                            <div class="card">
                                <img src="https://i.imgur.com/16kDbZk.jpg"
                                    alt="Seamless glass aquarium" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Seamless glass aquarium</h5>
                                    <p class="card-text">Using flexible, sturdy glass with high impact resistance,</p>
                                    <div class="fish-price">$24,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-6">
                            <div class="card">
                                <img src="https://i.imgur.com/raGVVmt.jpg"
                                    alt="3-in-1 aquarium" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">3-in-1 aquarium</h5>
                                    <p class="card-text">With all essential features such as filtration, lighting, clock,...</p>
                                    <div class="fish-price">$25.99</div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-6">
                            <div class="card">
                                <img src="https://i.imgur.com/tJQFusj.jpg"
                                    alt="Molded aquarium" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Molded aquarium</h5>
                                    <p class="card-text">Very diverse in shape and size.</p>
                                    <div class="fish-price">$25.99</div>
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
                                <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
    <?php include_once  './app/components/footer.php'; ?>
    <script src="./public/js/sidebar.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
</body>

</html>