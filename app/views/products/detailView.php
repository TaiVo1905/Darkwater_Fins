<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/link.php'; ?>
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/detail.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        include_once './app/components/header.php';
        include_once './app/components/banner.php';
        echo showBanner($data[0]->getProductName(), ['Home', $data[0]->getProductName()]);
    ?> 
    <div class='container'>
        <?php
            $html = "
                    <div class='card mb-3 product-detail' style='max-width: 1260px; border: none;' data-product-id ='{$data[0]->getProductId()}'>
                        <div class='row g-5 align-items-center'>
                            <div class='col-md-4'>
                                <img src='{$data[0]->getProductImgUrl()}' class='img-fluid rounded-start' alt='Product Image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <p class='price'>$" . $data[0]->getProductPrice() . "</p>
                                    <p class='card-text'>
                                        {$data[0]->getProductSub()}
                                    </p>
                                    <div class='d-flex align-items-center mb-4'>
                                        <input type='number' value='1' min='1'>
                                        <button class='btn btn-primary checkout'>BUY NOW</button>
                                    </div>
                                    <h5 class='card-title'><span>CATEGORY:</span>{$data[0]->getProductCategory()}</h5>
                                    <h5 class='card-title'><span>PRODUCT ID:</span>{$data[0]->getProductId()}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class='nav nav-tabs'>
                        <li class='nav-item'>
                            <a class='nav-link active' id='description-tab' data-bs-toggle='tab' href='#description'>DESCRIPTION</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='reviews-tab' data-bs-toggle='tab' href='#reviews'>REVIEWS (" . count($data[1] ?? []) . ")</a>
                        </li>
                    </ul>
                    <div class='tab-content'>
                        <div class='tab-pane fade show active' id='description'>
                            <p>{$data[0]->getProductDescription()}</p>
                        </div>
                        <div class='tab-pane fade' id='reviews'>
                            <span>
                    ";
            if(!$data[1]) {
                $html .= "<p>No reviews yet. Be the first to write a review!</p>";
            } else {
                include_once("./app/components/commentItem.php");
                $html .= "<div class='card text-body' id='comment-area'>";
                foreach ($data[1] as $userComment) {
                    $html .= renderUserComment($userComment->getUser()->getUserImgUrl(),
                                            $userComment->getUser()->getUserName(),
                                            $userComment->getDateCreate(),
                                            $userComment->getCommentContent());
                };
                $html .= "</div>";
            }
            $html .= "</span>";
            if (isset($_SESSION["user_id"])) {
                $html .= "
                        <div class='card mt-3' id='comment-box'>
                            <div class='card-body p-4'>
                                <div class='d-flex flex-start w-100'>
                                    <img class='rounded-circle shadow-1-strong me-3'
                                        src='{$data[2]->getUserImgUrl()}' alt='avatar' width='60'height='60' />
                                    <div class='w-100'>
                                        <h5 id='userName'>{$data[2]->getUserName()}</h5>
                                        <textarea class='form-control' id='commentContent' rows='2' data-user-id = '{$data[2]->getUserId()}'></textarea>
                                        <div class='d-flex justify-content-end mt-3'>
                                            <button  type='button' class='btn btn-primary'>Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
            $html .= "</div></div>";
            echo $html;
        ?>
    </div>
    <?php
        include_once  './app/components/toast.php';
        echo displayToast("");
        include_once  './app/components/footer.php';
    ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/checkout.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/userComment.js?v=<?php echo time(); ?>"></script>
</body>
</html>