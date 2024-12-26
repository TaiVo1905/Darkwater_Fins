<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/headerAdmin.css">
    <link rel="stylesheet" href="./public/css/sidebarAdmin.css">
</head>
<body style="">
<?php 
    $totalOrder = count($data);
    $totalMoney = 0;
    $productSold = 0;
    foreach($data as $order) {
      $totalMoney += $order->product_price * $order->quantity;
    }
    foreach($data as $order) {
      $productSold += $order->quantity;
    }
    require_once("./app/components/headerAdmin.php");
    echo generateDashboard(null , $totalOrder, $totalMoney, $productSold);
    require_once("./app/components/sidebarAdmin.php");
 ?>
<canvas id="dashBoardChart" style="padding: 0 20px 0 380px; width:100%; height: 60vh"></canvas>
<script src="./public/js/dashboard.js"></script>
</body>
</html>