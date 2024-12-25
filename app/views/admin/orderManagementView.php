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
      $dashboardHTML = generateDashboard('hide-element', '34 orders', '$20000', '33');
      echo $dashboardHTML;
      ?>
      <?php include_once './app/components/sidebarAdmin.php' ?>
      <div class="table-container big_container">
        <table class="table_btn align-middle text-center small_container">
          <thead class="table-head">
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Phone</th>
              <th>Order date</th>
              <th>Total</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody class="table-body-order">
            <tr data-order-id="1" class="order-row">
              <td>1</td>
              <td>Mai Tram</td>
              <td>123456789</td>
              <td>10-3-3003</td>
              <td>$99,000</td>
              <td id="status-1">Pending</td>
              <td>
                <button class="confirm-btn btn btn-sm btn-primary">
                  Confirm
                </button>
                <i class="icon-delete bi bi-trash m-1"></i>
              </td>
            </tr>
            <tr data-order-id="2" class="order-row">
              <td>2</td>
              <td>Mai Tram Huynh</td>
              <td>987654321</td>
              <td>5-8-1234</td>
              <td>$75,000</td>
              <td id="status-2">Pending</td>
              <td>
                <button class="confirm-btn btn btn-sm btn-primary">
                  Confirm
                </button>
                <i class="icon-delete bi bi-trash m-1"></i>
              </td>
            </tr>
            <tr data-order-id="3" class="order-row">
              <td>3</td>
              <td>Mai Tram Huynh</td>
              <td>987654321</td>
              <td>5-8-1234</td>
              <td>$75,000</td>
              <td id="status-3">Pending</td>
              <td>
                <button class="confirm-btn btn btn-sm btn-primary">
                  Confirm
                </button>
                <i class="icon-delete bi bi-trash m-1"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- form xác nhậnn confirm-->
      <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmationModalLabel">
                Confirm Order
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to confirm this order?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Form xac nhận xóa -->
      <div class="modal fade" id="confirdeleteModal" tabindex="-1" aria-labelledby="confirdeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirdeleteModalLabel">Confirm order deletion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this order?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="deleteButton">Delete</button>
            </div>
          </div>
        </div>
      </div>

      <div class="order-detail w-75 ">
        <h2 class="text-center">Order Detail</h2>
        <div class="order-info">
          <p> <b>Order ID: </b><span id="order-id">1</span></p>
          <p> <b>User: </b><span id="user-name">Mai Tram</span></p>
          <p> <b>Phone: </b><span id="phone-number">123456789</span></p>
          <p> <b>Address: </b><span id="phone-number">Quang Binh</span></p>
          <p> <b>Order date: </b><span id="order-date">01-01-2005</span></p>
          <p> <b>Total: </b><span id="total-price">8987</span></p>
          <p> <b>Status: </b><span id="order-status">Pending</span></p>
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
            <tbody class="table-body">
              <tr>
                <td>1</td>
                <td>Con cá coi</td>
                <td>30 </td>
                <td>$66.8</td>
                <td>$99.0</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Con cá coi</td>
                <td>30 </td>
                <td>$66.8</td>
                <td>$99.0</td>
              </tr>
            </tbody>
          </table>
        </div>
        <button class="confirm-btn btn btn-sm btn-primary float-end">Confirm</button>
      </div>
  </div>
      <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
      <script src="./public/js/orderManagement.js?v=<?php echo time(); ?>"></script>
</body>

</html>