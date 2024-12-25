<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?php echo BASE_URL ?>">
    <?php include_once './app/components/bootStrapAndFontLink.php'; ?>
    <link rel="stylesheet" href="./public/css/addProduct.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="add-product-container">
        <h1 class="text-center">Add Product</h1>
        <form class="form-add-product d-flex" method="POST" enctype="multipart/form-data">
            <div class="left-form p-3 w-100">
                <div class="product-name-fiel d-flex flex-column mb-4">
                    <label for="productName"><b>Product name</b></label>
                    <input class="input-area" type="text" id="productName" name="productName" required>
                </div>  
                <div class="image-container d-flex flex-column mb-4">
                    <img id="img-product" name="product_img" src="" alt="Product Image" class="image-product">
                    <input type="file" name="image" class="file-input" accept="image/*">
                </div>
                <div class="product-type d-flex flex-column mb-4">
                    <label for="productType"><b>Product type</b></label>
                    <label>
                        <input class="input-area" type="radio" name="choice" value="Aquarium"> Aquarium
                    </label>
                    <label>
                        <input class="input-area" type="radio" name="choice" value="Fish"> Fish
                    </label>
                    <label>
                        <input class="input-area" type="radio" name="choice" value="Fish Food">Fish Food
                    </label>
                </div>
                <div class="product-price d-flex flex-column mb-4">
                    <label for="productPrice"><b>Product price</b></label>
                    <input class="input-area" type="number"  id="productPrice" min="0" name="productPrice" required>
                </div>
            </div>
    
            <div class="right-form p-3 w-100">
                <div class="productSub d-flex flex-column mb-4">
                    <label for="productSub"><b>Product sub</b></label>
                    <input class="input-area" type="text" id="productSub" name="productSub" required>
                </div>
                <div class="product-description d-flex flex-column mb-4">
                    <label for="productDescription"><b>Product description</b></label>
                    <textarea id="productDescription" name="productDescription" required></textarea>
                </div>
                <div class="product-stock d-flex flex-column mb-4">
                    <label for="productStock"><b>Product stock</b></label>
                    <input class="input-area" type="number" id="productStock" min="0" name="productStock" required>
                </div>
                <div class="product-category-fiel d-flex flex-column mb-4">
                    <label for="productCategory"><b>Product Category</b></label>
                    <input class="input-area" type="text" id="productCategory" name="productCategory" required>
                </div> 
                <div class="button-fiel float-end">
                    <button class = "cancel-btn btn btn-danger">Cancel</button>
                    <button type="submit" id="save-btn" class = "save-btn btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="confirmRedirectModal" tabindex="-1" aria-labelledby="confirmRedirectModalLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmRedirectModalLabel">Product added successfully</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you want to stay on this page?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="no-button" >No</button>
            <button type="button" class="btn btn-primary" id="yes-button" data-bs-dismiss="modal">Yes</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./public/js/addProduct.js?v=<?php echo time(); ?>"></script>
</body>
</html>