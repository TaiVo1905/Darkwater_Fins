<!DOCTYPE html>
<html Exampleg="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/link.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/success.css?v=<?php echo time(); ?>">
  
</head>

<body>
    <div class="container success-form p-5 mt-5 mb-5">
        <div class="head-success-form d-flex flex-column align-items-center jus">
            <h3>Payment successful</h3>
            <i class="bi bi-check-circle icon-success mt-3"></i>
            <p class="mt-4">Payment has been successfully made. Darkwater Fins will confirm contact to deliver your order as soon as possible.</p>
        </div>
        <?php
            $username = $_SESSION["info_checkout"]["username"] ?? $data[1]->getUserName();
            $phone_number = $_SESSION["info_checkout"]["phone_number"] ?? $data[1]->getPhoneNumber();
            $address = $_SESSION["info_checkout"]["address"] ?? $data[1]->getAddress();
            echo "
                <div class='address d-flex justify-content-between mb-4'>
                    <span class='address-title gay-color'>Receiver</span>
                    <span>$username</span>
                </div>
                <div class='phone d-flex justify-content-between mb-4'>
                    <span class='gay-color'>Phone number</span>
                    <span>$phone_number</span>
                </div>
                <div class='address d-flex justify-content-between mb-4'>
                    <span class='address-title gay-color'>Delivery address</span>
                    <span class='text-break'>$address</span>
                </div>
                <div class='total-price d-flex justify-content-between mb-5 mt-3 fw-bold'>
                    <span>Price</span>
                    <span>$" . $_SESSION['total_price'] . "</span>
                </div>
            ";
        ?>
        <div class="payment_method d-flex justify-content-between mb-4">
            <span class="gay-color">Payment method</span>
            <span>Cash on delivery</span>
        </div>
        <button class="float-end btn-continue mb-3"> <a href="./products/fishes">Continue shopping</a></button>
    </div>
</body>
</html>