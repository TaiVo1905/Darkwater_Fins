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
    <link rel="stylesheet" href="./public/css/detail.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once './app/components/header.php' ?>
    <?php include_once './app/components/banner.php';
     echo showBanner($data[0]->getProductName(), ['Home', $data[0]->getProductName()]); 
    ?>
    <div class="container">
        <?php 
         require_once("./app/components/detail.php");
         foreach($data as $data) {
            echo displayProductCard($data->getProductId(), $data->getProductImgUrl(), $data->getProductDescription(), $data->getProductPrice(), $data->getProductSub(), $data->getProductCategory());
         } ?>
    </div>
    <?php
    include_once  './app/components/toast.php';
    echo displayToast("");
 ?>
    <?php include_once  './app/components/footer.php'; ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/checkout.js?v=<?php echo time(); ?>"></script>
</body>
</html>