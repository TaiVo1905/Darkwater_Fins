<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/link.php'; ?>
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
    $pageName = "";
    $url = rtrim($_GET["url"], "/");
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode("/", $url);
    if ($url[1] == "fishFoods") {
        $pageName = "Fish Food";
    } elseif ($url[1] == "fishes") {
        $pageName = "Aquarium Fish";
    } elseif ($url[1] == "aquariums") {
        $pageName = "Aquarium";
    }
    $url = "./products/$url[1]";
    echo showBanner($pageName, ['Home', $pageName]);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3">
                <?php require_once './app/components/sidebar.php'; ?>
            </div>
            <!-- Main content -->
            <div class="col-9">
                <!-- Phần đầu với icons và dropdown -->
                <div class="d-flex justify-content-end mb-3 top-right-content">
                    <select class="form-select w-25" style="border-radius: 0;" id="sortSelect">
                        <option value="1">Sort by </option>
                        <option value="2">Sort by highest</option>
                        <option value="3">Sort by lowest</option>
                    </select>
                </div>
                    <div class="row" id="product-container">
                        <?php
                            require_once("./app/components/itemCard.php");
                                foreach($data[0] as $item) {
                                    echo displayItemCard($item->getProductId(), $item->getProductImgUrl(), $item->getProductName(), $item->getProductSub(), $item->getProductPrice(), $url);
                                }
                        ?>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                <?php
                                    $pageNum = count($data[0])/6 + 1;
                                    for($i = 1; $i <= $pageNum; $i++) {
                                        echo '<li class="page-item"><a class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
    <?php include_once  './app/components/footer.php'; ?>
    <?php
        include_once  './app/components/toast.php';
        echo displayToast("");
    ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/sidebar.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/shoppingCart.js?v=<?php echo time() ?>"></script>
    <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/products.js?v=<?php echo time(); ?>"></script>
</body>

</html>