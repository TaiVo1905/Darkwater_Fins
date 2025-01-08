<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include_once './app/components/link.php' ?>
  <base href="<?php echo BASE_URL ?>">
  <link rel="stylesheet" href="./public/css/common.css">
  <link rel="stylesheet" href="./public/css/admin/header.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/admin/sidebar.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="./public/css/admin/orderManagement.css?v=<?php echo time(); ?>">
</head>

<body>
  <div style="background-color: #F4F4F4; height:100vh;">
    <?php 
      require_once("./app/components/admin/header.php");
      echo generateDashboard('hide-element', '34 orders', '$20000', '33', "Orders management");
      require_once("./app/components/admin/sidebar.php");
    ?>
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
        <table class="table-body-order table-btn align-middle text-center small_container">
          <?php
            foreach($data as $order) {
              echo "
                    <tr data-order-id='{$order->getOrderId()}' class='order-row admin-table-row'>
                      <td>{$order->getOrderId()}</td>
                      <td>{$order->getReceiver()}</td>
                      <td>{$order->getPhoneNumber()}</td>
                      <td>{$order->getOrderDate()}</td>
                      <td>{$order->getOrderStatus()}</td>
                      <td>{$order->getTotalPrice()}</td>
                    </tr>
                  ";
            }
          ?>
          
        </table>
      </table>
      <div class="d-flex justify-content-center mt-3">
          <nav>
              <ul class="pagination mb-0">
                  <?php
                      $pageNum = count($data)/25 + 1;
                      if($pageNum > 2) {
                          for($i = 1; $i <= $pageNum; $i++) {
                              echo '<li class="page-item"><a class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
                          }
                      }
                  ?>
              </ul>
          </nav>
      </div>
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
      <script src="./public/js/admin/orderManagement.js?v=<?php echo time(); ?>"></script>
      <script src="./public/js/admin/sidebar.js?v=<?php echo time(); ?>"></script>
      <script src="./public/js/pagination.js?v=<?php echo time(); ?>"></script>
</body>

</html>