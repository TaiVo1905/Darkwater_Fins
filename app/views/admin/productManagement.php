<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <i class="icon-setting bi bi-gear admin"></i>
                        
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

</body>
</html>