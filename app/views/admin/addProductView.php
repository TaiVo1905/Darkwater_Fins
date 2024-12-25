<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once './app/components/bootStrapAndFontLink.php'; ?>
    <link rel="stylesheet" href="../public/css/addProduct.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="add-product-container">
        <h1 class="text-center">Add Product</h1>
        <form class="form-add-product d-flex">
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
                <div class="button-fiel float-end">
                    <button class = "cancel-btn btn btn-danger">Cancel</button>
                    <button class = "save-btn btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../public/js/addProduct.js?v=<?php echo time(); ?>"></script>

</body>
</html>