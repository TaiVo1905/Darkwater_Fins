<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include_once("./app/components/bootStrapAndFontLink.php"); ?>
    <base href="http://localhost/Darkwater_fins/">
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid container-background" id="register-form">
        <div class="row pt-3 text-white">
            <div class="col-6">
                <a href="Home" class="btn custom-btn-outline justify-content-start col-4">Back to home</a>
            </div>
        </div>
        <div class="d-flex align-items-center mt-5">
            <div class="col-6">
                <div class="display-3 fw-bold text-white mx-auto">Welcome, Looks like you're new here!</div>
            </div>
            <form action="" class= "col-4 mx-auto shadow px-3 py-5 rounded-3 needs-validation" novalidate>
                <div class="mb-3">
                    <input type="text" class="form-control form-control custom-opacity-form" id="user_name" placeholder="Full name" required>
                    <div class="invalid-feedback">Please provide your name</div>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control form-control custom-opacity-form" id="user_email" placeholder="Email" required>
                    <div class="invalid-feedback">Invalid email</div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control custom-opacity-form" id="user_password" placeholder="Password" required>
                    <div class="invalid-feedback">Password must be more than 8 characters</div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control form-control custom-opacity-form" id="user_confirm_password" placeholder="Password confirmation" required>
                    <div class="invalid-feedback">Invalid password confirmation</div>
                </div>
                <div class="mb-3">
                    <div class="row g-3">
                        <div class="col-8">
                            <input type="password" class="form-control form-control custom-opacity-form" id="user_authentication_code" placeholder="Authentication code" required>
                            <div class="invalid-feedback">Invalid authentication code</div>
                        </div>
                        <div class="col-4 d-grid">
                            <button type="button" class="btn btn-sm custom-btn-outline fw-bold mb-auto">Send code</button>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn custom-btn-outline fw-bold">Sign up</button>
                </div>
                <h6 class="pt-3 text-center">Already a member? <a href="LogIn" class="custom-color">Sign in</a></h6>
            </form>
        </div>
    </div>
</body>
<script src="./public/js/registerAndLogin.js?v=<?php echo time(); ?>"></script>
</html>