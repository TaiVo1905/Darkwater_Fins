<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <base href="<?php echo BASE_URL ?>">
    <?php require_once("./app/components/bootStrapAndFontLink.php")?>
    <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <style>
      .custom-btn-outline {
          color: var(--primary-color3);
          border-color: var(--primary-color3);
      }

      .custom-btn-outline:hover {
          background-color: var(--primary-color3);
          color: var(--primary-color1);
      }
    </style>
</head>
<body>
    <?php require_once("./app/components/header.php")?>
    <?php 
            require_once("./app/components/banner.php");
            echo showBanner("Shopping cart", ["Home", "Shopping cart"]);
    ?>

<div class="container my-5">
    <h3 class="mb-4 fw-bold">Shopping Cart</h3>
    <div class="d-flex justify-content-end mb-2">
        <span class="text-muted">3 items</span>
    </div>
    <table class="table align-middle">
        <tbody>
            <tr>
                <td style="width: 2%">
                    <input type="checkbox" class="form-check-input">
                </td>
                <td style="width: 15%">
                    <img class="rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2W50GGieLi2T_e9XHOxA22QI3uTWqmmyg1g&s" alt="Fish" style="width: 100px; height: 100px;">
                </td>
                <td>
                    <span class="fw-bold">Siamese Fighting Fish, Red</span><br>
                    <small class="text-muted">Fish</small>
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-light dashQuantity"><i class="bi bi-dash"></i></button>
                    <span class="mx-2 quantity">1</span>
                    <button class="btn btn-sm btn-light plusQuantity"><i class="bi bi-plus"></i></button>
                </td>
                <td class="text-center">$<span>44.00</span></td>
                <td style="width: 2%">
                    <i class="bi bi-x-lg text-danger"></i>
                </td>
            </tr>
        </tbody>
  </table>
    <div class="d-flex justify-content-between align-items-center">
        <a href="./products/fishes" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Back to shop</a>
        <button class="btn custom-btn-outline px-4">CHECKOUT</button>
    </div>
</div>
<?php include_once("./app/components/footer.php"); ?>
<script src="./public/js/shoppingCart.js?v=<?php echo time() ?>"></script>
</body>
</html>