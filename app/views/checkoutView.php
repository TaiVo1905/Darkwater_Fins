<!DOCTYPE html>
<html Exampleg="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darkwater Fins</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/banner.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/checkout.css?v=<?php echo time(); ?>">

</head>

<body>
    <?php include_once './app/components/header.php'; ?>
    <?php include_once './app/components/banner.php';
    echo showBanner('Checkout', ['Home', 'Checkout']);
    ?>
        <div class="container my-4">

        <div class="row mb-3">
            <div class="col-12">
                <h2 class="fw-bold">Darkwater Fins | Pay</h2>
            </div>
        </div>
        
        <div class="address_order row mb-4 p-3 rounded">
            <div class="col-8">
                <span class="fw-semibold delevery_address"><i class="bi bi-geo-alt me-2 delevery_address"></i>Delivery address</span>
                <div class="d-flex">
                    <p class="mb-0 d-inline-block me-3">Tran Cong Doan 0942345105</p>
                    <p class="d-inline-block">Nhà Thờ Giáo Xứ Phu Kinh, Phu Hoa, Quang Trach, Quảng Binh</p>
                </div>
            </div>
            <div class="col-4 text-end d-flex align-items-center justify-content-end">
                <p  class="edit_address text-primary text-decoration-none">Edit</p>
            </div>
        </div>

        <!-- Products Table -->
        <div class="row ">
            <div class="col-12 order-item">
                <table class="table align-middle">
                    <thead class="">
                        <tr>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td>
                                <div class="d-flex align-items-center">
                                    <img style="max-width: 80px; max-height: 80px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz2o14Olyw0w-bMlkcMQfWKUkYlfuQTs0wog&s" class="me-2" alt="Product">
                                    <div>
                                        <p class="mb-0">Siamese Fighting Fish, White</p>
                                        <small class="text-muted">Category: Unique</small>
                                    </div>
                                </div>
                            </td>
                            <td class="quantity">2</td>
                            <td>$30.00</td>
                            <td>$60.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img style="max-width: 80px; max-height: 80px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQ-vwAuwtl9iP3qGEuE5swc8lGBDkZoq8Z2Q&s" class="me-2" alt="Product">
                                    <div>
                                        <p class="mb-0">Siamese Fighting Fish, White</p>
                                        <small class="text-muted">Category: Unique</small>
                                    </div>
                                </div>
                            </td>
                            <td class="quantity" >2</td>
                            <td>$30.00</td>
                            <td>$60.00</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="sumary_fiel row justify-content-end">
            <div class="d-flex justify-content-between p-4 border-bottom">
                <div>Payment method</div>
                <div class="pay_method">Cash on Delivery</div>
            </div>
            <div class="col-md-5 col-12 p-3 rounded">
                <div class="d-flex justify-content-between mb-2">
                    <span>Total cost of goods</span>
                    <span>$120.00</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Total shipping cost</span>
                    <span>$30.00</span>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total payment</span>
                    <span class="total_price">$150.00</span>
                </div>
            </div>
            <div class="col-12 text-end mt-3 mb-3">
                <button class="checkout-btn btn btn-primary px-4 py-2 fw-bold">Checkout</button>
            </div>
        </div>
    </div>
    
    <!-- Form address -->
    <div class="form-container">
        <form action="">
            <div class="mb-4 input-fiel mb-5">
                <label for="username" class="form-label">Name</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Type name here.." required>
            </div>
            <div class="mb-4 input-fiel mb-5">
                <label for="phonenumber" class="form-label">Phone number</label>
                <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Type phone number here.." required>
            </div>
            <div class="mb-4 input-fiel mb-5">
                <label for="user-address" class="form-label">Address</label>
                <input type="text" id="user-address" name="user-address" class="form-control" placeholder="Type address here.." required>
            </div>
            <div class="btn-fiel">
                <button type="button" class="cancel_btn">Cancel</button>
                <button type="submit" class="save_btn">Save</button>
            </div>
        </form>
    </div>
    <div class="overlay"></div>

    <?php include_once  './app/components/footer.php'; ?>
    <?php include_once  './app/components/toast.php';
    echo displayToast('No changes have been made yet'); ?>
    <script src="./public/js/validator.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/checkout.js?v=<?php echo time(); ?>"></script>

</body>
</html>