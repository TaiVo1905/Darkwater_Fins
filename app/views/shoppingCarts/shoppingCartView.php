<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <base href="<?php echo BASE_URL ?>">
    <?php require_once("./app/components/link.php")?>
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
        <span class="text-muted"><span class="countCart"><?php echo ($data[1]->totalQuantity ? $data[1]->totalQuantity : 0) ?></span> Items</span>
    </div>
    <table class="table align-middle shoppingCart">
        <tbody>
          <?php
            require_once("./app/components/cartItem.php");
            foreach($data[0] as $item) {
              echo createCartItem($item->getProductId(), $item->getProductName(), $item->getProductImgUrl(), $item->getProductType(), $item->getQuantity(), $item->getProductPrice());
            }
          ?>
        </tbody>
  </table>
    <div class="d-flex justify-content-between align-items-center">
        <a href="./products/fishes" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Back to shop</a>
        <button class="btn custom-btn-outline px-4 checkout">CHECKOUT</button>
    </div>
</div>
<?php
    include_once  './app/components/toast.php';
    echo displayToast("");
 ?>
<?php include_once("./app/components/footer.php"); ?>
<script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
<script src="./public/js/shoppingCart.js?v=<?php echo time() ?>"></script>
<script src="./public/js/header.js?v=<?php echo time() ?>"></script>
</body>
</html>