<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <base href="<?php echo BASE_URL ?>">
  <?php include_once './app/components/link.php' ?>
  <link rel="stylesheet" href="./public/css/common.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/admin/header.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/admin/sidebar.css?v=<?php echo time(); ?>">
</head>
<body style="">
  <?php 
    $totalOrder = count($data);
    $totalMoney = 0;
    $productSold = 0;
    foreach($data as $order) {
      $totalMoney += $order->getProductPrice() * $order->getQuantity();
    }
    foreach($data as $order) {
      $productSold += $order->getQuantity();
    }
    require_once("./app/components/admin/header.php");
    echo generateDashboard(null , $totalOrder, $totalMoney, $productSold, "Dashboard");
    require_once("./app/components/admin/sidebar.php");
  ?>
  <canvas id="dashBoardChart" style="padding: 0 20px 0 380px; width:100%; height: 60vh"></canvas>
  <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
  <script src="./public/js/admin/dashboard.js?v=<?php echo time(); ?>"></script>
  <script src="./public/js/admin/sidebar.js?v=<?php echo time(); ?>"></script>
</body>
</html>