<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <?php include_once("./app/components/bootStrapAndFontLink.php"); ?>
    <base href="<?php echo BASE_URL ?>">
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/register.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid container-background">
        <div class="row pt-3 text-white p-5">
            <div class="col-6">
                <a href="Home" class="btn custom-btn-outline justify-content-start col-4">Back to home</a>
            </div>
        </div>
        <div class="d-flex align-items-center h-75 mt-3">
            <div class="col-7">
                <div class="display-3 fw-bold text-white mx-auto p-5">Welcome, We are glad to see you again!</div>
            </div>
            <form action="LogIn" method="POST" class= "col-4 mx-auto shadow px-3 py-5 rounded-3 needs-validation" novalidate>
                <div class="mb-3">
                    <input type="email" class="form-control form-control custom-opacity-form" id="user_email" name="user_email" placeholder="Email" required  value="<?php echo isset($data["user_email"]) ? $data["user_email"] : ""?>">
                    <div class="invalid-feedback">Invalid email</div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control custom-opacity-form" id="user_password" name="user_password" placeholder="Password" required  value="<?php echo isset($data["user_password"]) ? $data["user_password"] : "" ?>">
                    <div class="invalid-feedback">Password must be more than 8 characters</div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn custom-btn-outline fw-bold">Sign in</button>
                </div>
                <h6 class="pt-4 text-center"><a href="ForgotPassword" class="custom-color">Forgot password?</a></h6>
                <h6 class="pt-3 text-center">Not a member? <a href="Register" class="custom-color">Sign up</a></h6>
            </form>
        </div>
    </div>
    <?php include_once  './app/components/toast.php';
    if(isset($data)) {
        echo displayToast("Invalid your email or password");
        echo '<script>
            const toast = new bootstrap.Toast(document.querySelector("#liveToast"));
            toast.show();
            setTimeout(() => {
            toast.hide();
            }, 5000);
        </script>';
    } ?>
</body>
<script src="./public/js/registerAndLogin.js?v=<?php echo time(); ?>"></script>
</html>