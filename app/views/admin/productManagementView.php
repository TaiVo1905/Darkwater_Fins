<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/bootStrapAndFontLink.php'; ?>
    <link rel="stylesheet" href="./public/css/productManagement.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="table-container container mt-4 ">
        <table class="table align-middle text-center ">
            <thead class="table-primary table-head">
                <tr>
                    <th>ID</th>
                    <th>Product's name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Options</th>
            </tr>
            </thead>
            <tbody class="table-body">
                <tr class="">
                    <td>1</td>
                    <td>Con cá coi</td>
                    <td><img style="width: 60px; height: 6opx;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFCh-A8p05QPQtI5-Qt4at-Jy7UmTGKr9nfQ&s" alt=""></td>
                    <td>********</td>
                    <td>99, To Hien Thanh...</td>
                    <td>
                        <i class="icon-setting bi bi-gear admin" data-id = "1"></i>
                        
                        <i class="icon-delete bi bi-trash m-1"></i>
                        
                    </td>
                </tr>
                <tr class="">
                    <td>2</td>
                    <td>Mai Tram Huynh</td>
                    <td>Tram@gmail.com</td>
                    <td>********</td>
                    <td>99, To Hien Thanh...ccccccccccccccccccccccccccc</td>
                    <td>
                        <i class="icon-setting bi bi-gear admin" data-id = "2"></i>
                        
                        <i class="icon-delete bi bi-trash m-1"></i>
                        
                    </td>
                </tr>
          <!-- Các dòng khác -->
            </tbody>
        </table>
    </div>

        
    <form class="container form-product-edit" id="form-product-edit"  enctype="multipart/form-data">
        <h2 class = "form-title mb-2">Product Edit Form</h2>
        <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="product_name" name="productName">
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
    <script src="./public/js/productManagement.js?v=<?php echo time(); ?>"></script>
    <?php include_once  './app/components/toast.php';
    echo displayToast('No changes have been made yet'); ?>
</body>
</html>