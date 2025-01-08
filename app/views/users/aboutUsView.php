<!DOCTYPE html>
<html Exampleg="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <base href="<?php echo BASE_URL ?>">
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/aboutUs.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once './app/components/header.php' ?>
    <div class="container hero-section" style="margin-top: 150px;">
        <div class="row align-items-center">
            <div class="col-md-6 hero-content">
                <h1>Welcome to DarkWater Fins</h1>
                <p>
                    We are a group of three students from Passerelles Numériques Vietnam, working together on this project as part of our Basic Web Project course.
                </p>
                <p>
                    Our goal is not only to enhance our web development skills but also to provide users with a reliable and user-friendly platform to explore and purchase high-quality fish.
                </p>
                <a href="#" class="btn btn-custom">More Info</a>
            </div>
            <div class="col-md-6 hero-image">
                <img src="./public/images/backgroundFish/bg3.jpg" alt="Betta Fish">
            </div>
        </div>
    </div>
    <div class="big_container_ab">
        <section class="team-section">
            <h2>Our Team</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="team-member">
                            <img src="./public/images/teamMember/MT.png" alt="Mai Tram">
                            <h4>Mai Tram</h4>
                            <p>Business Analyst</p>
                            <div class="social-iconss">
                                <a href="#"><i class="bi bi-envelope"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <img src="./public/images/teamMember/ductai.png" alt="Duc Tai">
                            <h4>Duc Tai</h4>
                            <p>Full-Stack Developer</p>
                            <div class="social-iconss">
                                <a href="#"><i class="bi bi-envelope"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <img src="./public/images/teamMember/CD.png" alt="Cong Doan">
                            <h4>Cong Doan</h4>
                            <p>Full-Stack Developer</p>
                            <div class="social-iconss">
                                <a href="#"><i class="bi bi-envelope"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container text-center mt-4" style="margin-bottom: 50px;">
    <?php include_once './app/components/hotFishCard.php'?>
    <h1 class="gallery-title mb-4">Gallery</h1>
    <div class="gallery-container">
        <?php
            if (isset($data)) {
                foreach ($data as $index => $fish) { 
                    echo createGallery($fish->getProductImgUrl(), $index + 1, "./products/fishes");  
                }
            }
        ?>
    </div>
    </div>
    <?php include_once './app/components/footer.php' ?>
    <?php
    include_once  './app/components/toast.php';
    echo displayToast("");
    ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
</body>

</html>