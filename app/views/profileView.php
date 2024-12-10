<!DOCTYPE html>
<html Exampleg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once './app/components/bootStrapAndFontLink.php'?>
    <link rel="stylesheet" href="./app/public/css/common.css">
    <link rel="stylesheet" href="./app/public/css/profile.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./app/public/css/banner.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php include_once './app/components/banner.php';
        echo showBanner('Home', ['Home','Profile']);
    ?>
    <div class="container mx-auto mt-5" style="width:50%; ">
        <h3 class = "profile-title mb-4">Profile Image</h3>
        <div class="profile-card">
            <div class="profile-header">
                <div class="image-container">
                    <img id = "img-user" src="" alt="User Img" class="image-user">
                    <div class="icon-overlay">
                        <i  class="bi bi-camera-fill camera-image-user"></i>
                    </div>
                    <input type="file" class="file-input" accept="image/*">
                </div>
            </div>
            <div class="profile-footer"></div> 
        </div>
        <h3 class = "profile-title mb-4 mt-5">Personal information</h3>
        <div class="profile-update-file p-5 pt-3 ">
            <div class="mb-3">
                <label for="fullname-user" class="form-label">Full name</label>
                <input type="text" class="form-control" id="fullname-user" value="">
            </div>
            <div class="mb-3">
                <label for="email-user" class="form-label">Email</label>
                <input type="email" class="form-control" id="email-user"  readonly >
            </div>
            <div class="mb-3">
                <label for="password-user" class="form-label">Password</label>
                <input type="password" class="form-control" id="password-user">
            </div>
            <div class="mb-3">
                <label for="phone-user" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone-user" value="">
            </div>
            <div class="mb-3">
                <label for="address-user" class="form-label">Address</label>
                <input type="text" class="form-control" id="address-user">
            </div>
        </div>
        <button type="button" class="btn btn-primary float-end m-1 w-25 mt-4">Save</button>
    </div>
    <script src="./app/public/js/profile.js?v=<?php echo time(); ?>"></script>
</body>
</html>