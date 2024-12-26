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
    <link rel="stylesheet" href="./public/css/productManagement.css?v=<?php echo time(); ?>">
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
                <thead class="table-primary table-head">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product's name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Options</th>
                </tr>
                </thead>
                <tbody class="table-body">
                    <tr class="product-row">
                        <td>1</td>
                        <td><img style="width: 60px; margin-bottom: 3px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFCh-A8p05QPQtI5-Qt4at-Jy7UmTGKr9nfQ&s" alt=""></td>
                        <td>Con cá coi</td>
                        <td>********</td>
                        <td>99, To Hien Thanh...</td>
                        <td>
                            <i class="icon-setting bi bi-gear admin"></i>
                            
                            <i class="icon-delete bi bi-trash m-1"></i>
                            
                        </td>
                    </tr>
                    <tr class="product-row">
                        <td>2</td>
                        <td>Mai Tram Huynh</td>
                        <td>Tram@gmail.com</td>
                        <td>********</td>
                        <td>99, To Hien Thanh...ccccccccccccccccccccccccccc</td>
                        <td>
                            <i class="icon-setting bi bi-gear admin"></i>
                            
                            <i class="icon-delete bi bi-trash m-1"></i>
                            
                        </td>
                    </tr>
            <!-- Các dòng khác -->
                </tbody>
            </table>
    </div>

            
        <form class="container form-product-edit">
            <h2 class = "form-title mb-2">Product Registration Form</h2>
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            
            <div class="mb-1">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" accept="image/*" required>
            </div>
        
            <div class="mb-1">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" required>
            </div>
        
            <div class="mb-1">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" required>
            </div>
        
            <div class="mb-1">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" required>
            </div>
        
            <div class="mb-1">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" required></textarea>
            </div >
            <div class="float-end">

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary ms-2" id="cancelButton">Cancel</button>
            </div>
        </form>
</div>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/productManagement.js?v=<?php echo time(); ?>"></script>
</body>
</html>