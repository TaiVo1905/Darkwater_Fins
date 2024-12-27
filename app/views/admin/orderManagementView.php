<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include_once './app/components/bootStrapAndFontLink.php' ?>
  <base href="<?php echo BASE_URL ?>">
  <link rel="stylesheet" href="./public/css/common.css">
  <link rel="stylesheet" href="./public/css/headerAdmin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/sidebarAdmin.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/orderManagement.css?v=<?php echo time(); ?>">
</head>

<body>
  <div style="background-color: #F4F4F4; height:100vh;">
      <?php include_once './app/components/headerAdmin.php';
      $dashboardHTML = generateDashboard('hide-element', '34 orders', '$20000', '33', "Orders management");
      echo $dashboardHTML;
      ?>
      <?php include_once './app/components/sidebarAdmin.php' ?>
      <div class="table-container big_container">
        <table class="table_btn align-middle text-center small_container">
          <thead class="table-head">
            <tr>
              <th>Order id</th>
              <th>Receiver</th>
              <th>Phone number</th>
              <th>Order date</th>
              <th>Status</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody class="table-body-order">
            <?php
              foreach($data as $order) {
                $order_id = $order->order_id;
                echo "
                      <tr data-order-id='$order->order_id' class='order-row'>
                        <td>$order->order_id</td>
                        <td>$order->receiver</td>
                        <td>$order->phone_number</td>
                        <td>$order->order_date</td>
                        <td>$order->order_status</td>
                        <td>$order->total_price</td>
                      </tr>
                    ";
              }
            ?>
            
          </tbody>
        </table>
      </div>
      <div class="order-detail w-75">
        <h2 class="text-center">Order Detail</h2>
        <div class="order-info">
          <p> <b>Order ID: </b><span id="order-id"></span></p>
          <p> <b>User: </b><span id="user-name"></span></p>
          <p> <b>Phone: </b><span id="phone-number"></span></p>
          <p> <b>Address: </b><span id="address"></span></p>
          <p> <b>Order date: </b><span id="order-date"></span></p>
          <p> <b>Total: </b><span id="total-price"></span></p>
        </div>
        <div class="product-detail mb-3">
          <table class="table align-middle text-center">
            <thead class="table-primary table-head">
              <tr>
                <th>ID</th>
                <th>Product's name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub price</th>

              </tr>
            </thead>
            <tbody id="order_details" class="table-body">
              
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <?php include_once  './app/components/toast.php';
    echo displayToast('');
  ?>
      <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
      <script src="./public/js/orderManagement.js?v=<?php echo time(); ?>"></script>
      <script src="./public/js/sidebarAdmin.js?v=<?php echo time(); ?>"></script>
</body>

</html>