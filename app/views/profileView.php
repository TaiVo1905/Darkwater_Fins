
<!DOCTYPE html>
<html Exampleg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="http://localhost/darkwater_fins/">
    <?php include_once './app/components/bootStrapAndFontLink.php'?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/profile.css?v=<?php echo time(); ?>">

</head>
<body>
    
    <?php include_once './app/components/header.php'; ?>
    <?php include_once './app/components/banner.php';
        echo showBanner('Account setting', ['Home','Profile']);
    ?>
    <form class="container body-profile mx-auto mt-5 needs-validation" style="width:50%; " method="POST" enctype="multipart/form-data"  id="profile-form" action="Profile/updateProfile" novalidate>
        <h3 class = "profile-title mb-4">Profile Image</h3>
        <div class="profile-card">
            <div class="profile-header">
                <div class="image-container">
                    <img id = "img-user" name = "user_img" src="<?php echo $data->user_img_url;?>" alt="User Img" class="image-user">
                    <div class="icon-overlay">
                        <i  class="bi bi-camera-fill camera-image-user"></i>
                    </div>
                    <input type="file" name = "image" class="file-input" accept="image/*">
                </div>
            </div>
            <div class="profile-footer"></div> 
        </div>
        <h3 class = "profile-title mb-4 mt-5">Personal information</h3>
        <div class="profile-update-file p-5 pt-3 ">
            <div class="mb-3">
                <label for="fullname-user" class="form-label">Full name</label>
                <input type="text" class="form-control " name = "username" id="fullname-user" value="<?php echo $data -> user_name;?>" required>
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="email-user" class="form-label">Email</label>
                <input type="email" class="form-control" name = "email" id="email-user"  readonly value="<?php echo $data -> email;?> " required>
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="password-user" class="form-label">Password</label>
                <input type="text" class="form-control" name = "password" id="password-user"value="<?php echo $data -> passwords;?>"required>
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="phone-user" class="form-label">Phone</label>
                <input type="text" class="form-control" name = "phone" id="phone-user" value="<?php echo $data -> phone_number;?>"required>
                <span class="form-message"></span>
            </div>
            <div class="mb-3">
                <label for="address-user" class="form-label">Address</label>
                <input type="text" class="form-control" name = "address" id="address-user" value="<?php echo $data -> address;?>"required>
                <span class="form-message"></span>
            </div>
        </div>
        <button type="submit" id="save-btn" name = "save_btn" class="btn btn-primary float-end m-1 w-25 mt-4 ">Save</button>
    </form>
    
    <?php include_once  './app/components/footer.php'; ?>
    <?php include_once  './app/components/toast.php';
    echo displayToast('No changes have been made yet'); ?>
    <script src="./public/js/profile.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/validator.js?v=<?php echo time(); ?>"></script>
    <script>
    Validator({
        form: '#profile-form',
        rules: [
        Validator.isRequired('#fullname-user'),
        Validator.isRequired('#password-user'),
        Validator.isRequired('#phone-user'),
        Validator.isRequired('#address-user'),
        Validator.isEmail('#email-user')
        ]
    })

    </script>
</body>
</html>