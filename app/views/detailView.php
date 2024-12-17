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
</head>
<style>
        .price {
            font-size: 32px;
            font-weight: bold;
            color: #1877F2;
            margin-bottom: 20px;
        }
        .card-text {
            color: #8c8c8c;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #1877F2;
            border-color: #1877F2;
            padding: 8px 30px;
        }
        .btn-primary:hover {
            background-color: #145DBF;
            border-color: #145DBF;
        }
        input[type="number"] {
            width: 60px;
            margin-right: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
        }
        .card-title span {
            color: #1877F2;
        }
        .card-title {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .container {
            margin-top: 30px;
        }
        .img-fluid {
            max-width: 100%;
            height: 350px;
            object-fit: cover;
        }
        .nav-tabs {
            border-bottom: 1px solid #ddd;
        }

        .nav-link {
            border: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
            padding: 10px 20px;
            font-weight: bold;
            color: #1877F2;
            background-color: #f8f9fa;
        }

        .nav-link.active {
            background-color: #1877F2;
            color: white !important;
            border-color: #1877F2;
        }
        .tab-content {
            color: #8c8c8c;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
        }
</style>
<body>
    <?php include_once './app/components/header.php' ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('Siamese Fighting Fish, Red', ['Home', 'Siamese Fighting Fish, Red']);
    ?>
    <div class="container">
        <div class="card mb-3" style="max-width: 1260px; border: none;">
            <div class="row g-5 align-items-center">
                <div class="col-md-4">
                    <img src="https://i.imgur.com/fQou4dN.jpg" class="img-fluid rounded-start" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="price">$19,99</p>
                        <p class="card-text">
                            Suspendisse quam lectus ut quisque arcu neque, fringilla eros sit quam nibh arcu magni, lorem ullamcorper. Nec quam eget wisi at, tellus sit occaecat sed et inceptos. Gravida aenean molestie donec lacinia curabitur, sit eu etiam, cras maecenas eget, faucibus ultrices suspendisse et sit. At commodo urna, vulputate libero turpis mollis facilisis, velit enim nisl nulla lacus integer. Nulla lectus sed egestas, et posuere interdum scelerisque ullamcorper, pellentesque risus ipsum mauris, dis habitant. Urna et arcu, fermentum fuga, elit ipsum, etiam elit ante vel class mauris nonummy. Suspendisse non semper tincidunt velit eget, tincidunt morbi, nam eget, eros luctus. Lacus amet ante, ducimus morbi diam iaculis tristique turpis maecenas, amet convallis vestibulum, porttitor augue ullamco. Vitae etiam proin. sit quam nibh arcu magni, lorem ullamcorper. Nec quam eget wisi at, tellus sit occaecat sed et inceptos. Gravida aenean molestie donec lacinia curabitur, sit eu etiam, cras maecenas eget.
                        </p>
                        <div class="d-flex align-items-center mb-4">
                            <input type="number" value="1" min="1">
                            <button class="btn btn-primary">BUY NOW</button>
                        </div>
                        <h5 class="card-title"><span>CATEGORY:</span> Siamese Fish</h5>
                        <h5 class="card-title"><span>PRODUCT ID:</span> 182</h5>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description">DESCRIPTION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews">REVIEWS (0)</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="description">
                <p>Lorem ipsum dolor sit amet, morbi pulvinar, lectus adipiscing magna vel id, proin et sed aliquam
                    nonummy vestibulum tellus. Nec blandit morbi viverra mauris mauris leo, magna purus fringilla.
                    Scelerisque pellentesque in, et montes suscipit massa nulla, eu urna. Nunc at, tincidunt phasellus
                    lorem dapibus tristique. Ultricies libero cursus etiam arcu consequat.</p>
                <p>Lorem risus purus erat purus augue mattis. Lectus euismod interdum aenean lobortis fermentum est, ac
                    sed in donec, libero eros, gravida malesuada pellentesque nonummy cras leo congue. Lorem ipsum dolor 
                    sit amet consectetur adipisicing elit. In voluptas atque enim deleniti omnis, ex voluptate quod porro 
                    officia inventore iusto iure vel molestiae, recusandae earum nostrum dolorem modi eaque id. Vero perspiciatis, 
                    voluptates doloremque tempora totam qui, nostrum eveniet minima distinctio placeat similique atque quidem maxime.
                     Quam, neque aspernatur.</p>
                <p>Suspensisse quam lectus et quisque arcu neque, fringilla eros sit quam nibh arcu magna.</p>
            </div>
            <div class="tab-pane fade" id="reviews">
                <p>No reviews yet. Be the first to write a review!</p>
            </div>
        </div>
    </div> 
    <?php include_once  './app/components/footer.php'; ?>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
</body>
</html>