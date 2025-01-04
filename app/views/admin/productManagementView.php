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
    <link rel="stylesheet" href="./public/css/admin/productManagement.css?v=<?php echo time(); ?>">
    <style>
        table.scrolldown tbody,
        table.scrolldown thead {
            display: block;
        }
    </style>
</head>
<body>
<div style="background-color: #F4F4F4; height:100vh;">
    <?php
        require_once("./app/components/admin/header.php");
        echo generateDashboard('hide-element', '34 orders', '$20000', '33', "Products management");
        require_once("./app/components/admin/sidebar.php");
    ?>
    <a href="./admin/addProducts/"><div class="addNewProducts"><i class="bi bi-patch-plus p-1"></i>Add new products</div></a>
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
                    <?php 
                        foreach ($data as $product){
                            echo "
                            <tr class='product-row'>
                                    <td>{$product->getProductId()}</td>
                                    <td><img style='width: 60px; margin-bottom: 3px;' src='{$product->getProductImgUrl()}' alt=''></td>
                                    <td>{$product->getProductName()}</td>
                                    <td>{$product->getProductPrice()}</td>
                                    <td>{$product->getProductStock()}</td>
                                    <td>
                                        <i class='icon-setting bi bi-gear admin' data-id = '{$product->getProductId()}'></i>
                                        
                                        <i class='icon-delete bi bi-trash m-1' data-id = '{$product->getProductId()}'></i>
                                        
                                    </td>
                        </tr>
                            ";
                        
                        }
                    ?>
                </tbody>
            </table>
    </div>

            
        <form class="container form-product-edit" id="form-product-edit">
            <h2 class = "form-title mb-2">Product Registration Form</h2>
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="product_name" name="productName" required>
            </div>
            
            <div class="mb-1">
                <label for="image" class="form-label">Image</label>
                <div class="img-fiel d-flex ">
                    <input style="line-height: 40px;" type="file" class="form-control" id="product_image" accept="image/*" name="productImg">
                    <img id="img-show" style="width:55px; height:55px; border-radius: 10px;" src="" alt="" name="productImage">
                </div>
            </div>
        
            <div class="mb-1">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="product_price" name="productPrice" required>
            </div>
        
            <div class="mb-1">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="product_quantity" name="productStock" required>
            </div>
        
            <div class="mb-1">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="product_title" name="productSub" required>
            </div>
        
            <div class="mb-1">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="product_description" rows="3" name="productDescription" required></textarea>
            </div >
            <div class="float-end">

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary ms-2" id="cancelButton">Cancel</button>
            </div>
        </form>
</div>
    <div class="modal fade" id="confirmRedirectModal" tabindex="-1" aria-labelledby="confirmRedirectModalLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmRedirectModalLabel">Product Updated successfully</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          Press yes to exit!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="yes-button" data-bs-dismiss="modal">Yes</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./public/js/define.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/admin/productManagement.js?v=<?php echo time(); ?>"></script>
    <script src="./public/js/admin/sidebar.js?v=<?php echo time(); ?>"></script>
    <?php include_once  './app/components/toast.php';
    echo displayToast('No changes have been made yet'); ?>
</body>
</html>