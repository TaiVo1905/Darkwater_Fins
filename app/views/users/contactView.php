<!DOCTYPE html>
<html Exampleg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <?php include_once './app/components/link.php'?>
    <base href="<?php echo BASE_URL ?>">
    <link rel="stylesheet" href="./public/css/common.?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
</head>
<body>
       <?php include_once './app/components/header.php'?>
        <div class="container" style="margin-top: 200px;margin-bottom:60px;">
            <h1 class="text-center mb-4">Drop a line</h1>
            <form class="w-50 mx-auto">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Your name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Your email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="5" placeholder="Your message" required></textarea>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="dataConsent" required>
                    <label class="form-check-label" for="dataConsent">
                        I agree that my submitted data is being collected and stored.
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">Send message</button>
                </div>
            </form>
        </div>
       <?php include_once './app/components/footer.php'?>
        <?php
            include_once  './app/components/toast.php';
            echo displayToast("");
        ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script>
        $(".header_container").classList.add("scrolled");
    </script>
</body>
</html>