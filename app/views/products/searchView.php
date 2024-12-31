<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
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
    $pageName = "";
    $searchQuery = isset($_GET['search_query']) ? trim($_GET['search_query']) : '';
    if ($searchQuery) {
        $pageName = "Search: " . ucfirst($searchQuery);
    }
    echo showBanner($pageName, ['Home', !empty($searchQuery) ? ucfirst($searchQuery) : $pageName]);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-9">
                    <div class="row">
                        <?php
                            if (empty($data)) {
                                echo '<div class="col-12"><p>No products found.</p></div>';
                            } else {
                                require_once("./app/components/itemCard.php");
                                $url = "";
                                foreach ($data as $item) {
                                    if($item->product_type == "Fish") {
                                        $url = "./products/fishes";
                                    } elseif($item->product_type == "Fish Food") {
                                        $url = "./products/fishfoods";
                                    } elseif($item->product_type == "Aquarium") {
                                        $url = "./products/aquariums";
                                    }
                                    echo displayItemCard($item->getProductId(), $item->getProductImgUrl(), $item->getProductName(), $item->getProductSub(), $item->getProductPrice(), $url);
                                }
                            }
                        ?>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                <?php
                                    $pageNum = count($data)/6 + 1;
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
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/shoppingCart.js?v=<?php echo time() ?>"></script>
    <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>

</body>

</html>