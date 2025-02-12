<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
    <link rel="icon" href="./public/images/logo/icon-x.jpg" type="image/x-icon">
    <?php include_once './app/components/link.php'?>
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/hotFish.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/text_banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/slider.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/product_fish.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
</head>
<body>
       <?php include_once './app/components/header.php'?>
       <div class="slider" id="slider">
            <p>Cultivating passion and bringing nature indoors</p>
            <h6>Discover a world of unique fish, diverse foods, and stunning aquariums.</h6>
            <a href="home/contactUs"><button type="button" class="btn btn-primary btn_contact">CONTACT US TODAY!</button></a>
            <div class="icon_social_media">
                <i class="bi bi-instagram"></i>
                <i class="bi bi-facebook"></i>
                <i class="bi bi-youtube"></i>
            </div>
        </div>
        <div class="big_container">
            <div class="products-section">
                <h1>Our Products</h1>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <a href="products/aquariums">
                                <div class="product-card">
                                    <div class="outer-box">
                                        <img src="./public/images/productFish/fish1.webp" alt="Aquarium Image">
                                    </div>
                                    <div class="inner-box">
                                        <i class="bi bi-basket3"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="product-text">
                                <h4>Aquarium</h4>
                                <p>Darkwater Fins has a wide range of aquariums available for both commercial.</p>
                                <a href="products/aquariums">MORE INFO</a>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="products/fishes">
                                <div class="product-card">
                                    <div class="outer-box">
                                        <img src="./public/images/productFish/fish2.webp" alt="Aquarium Image">
                                    </div>
                                    <div class="inner-box">
                                        <i class="bi bi-droplet"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="product-text">
                                <h4>Fish</h4>
                                <p>Darkwater Fins offers a variety of fish for your aquarium needs.</p>
                                <a href="products/fishes">MORE INFO</a>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="products/fishFoods">
                                <div class="product-card">
                                    <div class="outer-box">
                                        <img src="./public/images/productFish/fish3.webp" alt="Aquarium Image">
                                    </div>
                                    <div class="inner-box">
                                        <i class="bi bi-backpack"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="product-text">
                                <h4>Fish food</h4>
                                <p>Darkwater Fins provides high-quality food for all types of aquarium fish.</p>
                                <a href="products/fishFoods">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include_once './app/components/hotFishCard.php'?>
        <h1 class="title">Hot fishes</h1>
        <div class='d-flex'>
            <?php
                if (isset($data)) {
                    foreach ($data as $fish) {
                        echo createHotFishCard($fish->getProductId(), $fish->getProductImgUrl(), $fish->getProductName(), $fish->getProductSub(), $fish->getProductPrice(), "./products/fishes");
                }
                    }
            ?>
        </div>
        <div class="text_banner">
            <p>Experts in aquariums,
                ornamental fish and fish food,
                offering variety and quality.</p>
            <h6>Darkwater Fins takes pride in the quality of service and its approach to luxury aquariums.
                Offering a wide range of services, Darkwater Fins has solidified its position as a leading provider
                of ornamental fish in the industry.
            </h6>
            <a href="./home/aboutUs"><button type="button" class="btn btn-primary">VIEW OUR PORTFOLIO</button></a>
        </div>
        <?php include_once './app/components/footer.php'?>
    <?php
        include_once  './app/components/toast.php';
        echo displayToast("");
    ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/shoppingCart.js?v=<?php echo time(); ?>"></script>
</body>
</html>