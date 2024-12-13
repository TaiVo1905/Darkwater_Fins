<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost:8080/Darkwater_Fins/">
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <link rel="stylesheet" href="./app/public/css/common.css">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/itemCard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/sidebar.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include_once './app/components/header.php' ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('Aquariums', ['Home', 'Profile']);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3">
                <?php include_once './app/components/sidebar.php' ?>
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
                                <img src="https://img.freepik.com/premium-photo/siamese-red-fighting-fish-white-background_44272-4572.jpg"
                                    alt="Siamese Fighting Fish, Red" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Siamese Fighting Fish, Red</h5>
                                    <p class="card-text">Suspendisse quam lectus ut quisque arcu neque.</p>
                                    <div class="fish-price">$19.99</div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-6">
                            <div class="card">
                                <img src="https://media.istockphoto.com/id/807443302/photo/red-siamese-betta-fighting-fish-half-moon-flip-body-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=0AF3jPnFp_MMpd-zDqTpu3PpPIZNbddaX8NxNndC6tg="
                                    alt="Siamese Fighting Fish, White" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Siamese Fighting Fish, White</h5>
                                    <p class="card-text">Nunc at, tincidunt pharetra lorem dapibus.</p>
                                    <div class="fish-price">$24.99</div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-6">
                            <div class="card">
                                <img src="https://img.freepik.com/premium-photo/realistic-betta-fish-white-background_941097-29204.jpg"
                                    alt="Crowntail Betta Fish" class="card-img-top">
                                <div class="icon-overlay">
                                    <i class="bi bi-cart-plus"></i>
                                    <i class="bi bi-link"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Crowntail Betta Fish</h5>
                                    <p class="card-text">Vulputate bibendum nec leo viverra, amet.</p>
                                    <div class="fish-price">$22.00</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
    <?php include_once  './app/components/footer.php' ?>
    <script src="./public/js/sidebar.js?v=<?php echo time(); ?>"></script>
</body>

</html>