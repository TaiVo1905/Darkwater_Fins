<!DOCTYPE html>
<html Exampleg="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/profile.css?v=<?php echo time(); ?>">

</head>

<body>

    <?php include_once './app/components/header.php'; ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('Account setting', ['Home', 'Profile']);
    ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3">
                <div class="sidebar bg-light p-4 ">
                    <h3 class="text-center mb-4">Profile Options</h3>
                    <ul class="list-group">
                        <li class="list-group-item account-label">
                            <a href="#" class="menu-link text-decoration-none " data-page="account">Account</a>
                        </li>
                        <li class="list-group-item password-label">
                            <a href="#" class="menu-link text-decoration-none " data-page="change-password">Change Password</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="menu-link text-decoration-none " data-page="order">Order</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Main content -->
            <div class="col-9 content-area">
                <form class=" body-profile mx-auto  needs-validation" style="width:80%; " method="POST" enctype="multipart/form-data" id="profile-form" action="Profile/updateProfile" novalidate>
                    <h3 class="profile-title mb-4">Profile Image</h3>
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="image-container">
                                <img id="img-user" name="user_img" src="<?php echo $data['userInfo']->user_img_url; ?>" alt="User Img" class="image-user">
                                <div class="icon-overlay">
                                    <i class="bi bi-camera-fill camera-image-user"></i>
                                </div>
                                <input type="file" name="image" class="file-input" accept="image/*">
                            </div>
                        </div>
                        <div class="profile-footer"></div>
                    </div>
                    <h3 class="profile-title mb-4 mt-5">Personal information</h3>
                    <div class="profile-update-file p-5 pt-3 ">
                        <div class="mb-3">
                            <label for="fullname-user" class="form-label">Full name</label>
                            <input type="text" class="form-control " name="username" id="fullname-user" value="<?php echo $data['userInfo']->user_name; ?>" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email-user" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email-user" readonly value="<?php echo $data['userInfo']->email; ?> " required>
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone-user" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone-user" value="<?php echo $data['userInfo']->phone_number; ?>">
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="address-user" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address-user" value="<?php echo $data['userInfo']->address; ?>">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <button type="submit" id="save-btn" name="save_btn" class="btn btn-primary float-end m-1 w-25 mt-4 ">Save</button>
                </form>
                <!-- Thay đổi password -->
                <form class="change-password mx-auto  needs-validation" style="width:80%; " method="POST" id="change-password-form" action="Profile/executeChangePassword" novalidate>
                    <h3 class="profile-title mb-4">Change password</h3>
                    <div class="profile-change-password p-5 pt-5 ">
                        <div class="mb-3">
                            <label for="old-password" class="form-label">Password</label>
                            <input type="password" class="form-control " name="old-password" id="old-password" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New password</label>
                            <input type="password" class="form-control" minlength="8" name="new-password" id="new-password" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" minlength="8" name="confirm-password" id="confirm-password" required>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <button type="submit" id="save_btn_change_pass" name="save_btn_change_pass" class="btn btn-primary float-end m-1 w-25 mt-4 ">Save</button>
                </form>

                <!-- Phần order -->
                <div class="order-page mx-auto" style="width:80%; ">
                    <ul class="nav nav-pills nav-fill mb-4">
                        <li class="nav-item nav_tab "  aria-current="page">
                            <a class="nav_tab_link nav-link rounded-0 border active" aria-current="page" data-status="Pending">Pending</a>
                        </li>
                        <li class="nav-item nav_tab">
                            <a class="nav_tab_link nav-link rounded-0 border" data-status="Shipping">Shipping</a>
                        </li>
                        <li class="nav-item nav_tab">
                            <a class="nav_tab_link nav-link rounded-0 border" data-status="Shipped">Shipped</a>
                        </li>
                        <li class="nav-item nav_tab">
                            <a class="nav_tab_link nav-link rounded-0 border" data-status="Canceled">Canceled</a>
                        </li>
                    </ul>
                    <div class="row mx-auto" >
                        <?php
                            require './app/components/orderItems.php';
                            foreach ($data['order'] as $order) {
                                echo renderOrderItems($order->order_id, $order->order_status, $order->product_img_url, $order->product_name, $order->product_category, $order->quantity, $order->product_price, $order->total_price);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once  './app/components/footer.php'; ?>
    <?php include_once  './app/components/toast.php';
    echo displayToast('No changes have been made yet'); ?>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/profile.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/validator.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script>
        Validator({
            form: '#profile-form',
            rules: [
                Validator.isRequired('#fullname-user'),
                Validator.isRequired('#phone-user'),
                Validator.isEmail('#email-user')
            ]
        })
        Validator({
            form: '#change-password-form',
            rules: [
                Validator.isRequired('#old-password'),
                Validator.isRequired('#new-password'),
                Validator.isRequired('#confirm-password'),
            ]
        })
    </script>
</body>

</html>