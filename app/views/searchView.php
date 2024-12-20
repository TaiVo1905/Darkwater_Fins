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
                            if (empty($data[0])) {
                                echo '<div class="col-12"><p>No products found.</p></div>';
                            } else {
                                require_once("./app/components/itemCard.php");
                                foreach ($data[0] as $item) {
                                    echo displayItemCard($item->product_id, $item->product_img_url, $item->product_name, $item->product_sub, $item->product_price);
                                }
                            }
                        ?>
                    </div>
            </div>
        </div>
    </div>
    <?php include_once  './app/components/footer.php'; ?>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
</body>

</html>