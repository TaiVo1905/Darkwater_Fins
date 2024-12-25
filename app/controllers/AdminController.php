<?php
    class AdminController extends Controller {
        public function orderManagement() {
            $this->view("admin/orderManagement");
        }
        public function userManagement() {
            $this->view("admin/userManagement");
        }
        public function productManagement() {
            $this->view("admin/productManagement");
        }
        public function addProductView() {
            $this->view("admin/addProduct");
        }
        public function handelAddProduct(){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->model("Products");
                $productModel = new ProductsModel();
                $product_name = $_POST["productName"];
                $uploadDir = './public/images/uploads/';
                $product_img = null;  
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['image']['name']);
                    $currentTime = date("Y-m-d-H-i-s");
                    $filePath = $uploadDir . $currentTime.str_replace(['$', '/', ':'], '', password_hash($fileName, PASSWORD_BCRYPT));;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                        $product_img = $filePath;  
                        
                    } else {
                        echo "<p style='color: red;'>Failed to upload image.</p>";
                    }
                }

                $product_type = $_POST["choice"];
                $product_price = $_POST["productPrice"];
                $product_sub = $_POST["productSub"];
                $product_description = $_POST["productDescription"];
                $product_stock = $_POST["productStock"];
                $product_category = $_POST["productCategory"];
                $result = $productModel -> addProduct($product_name,  $product_img, $product_price, $product_sub, $product_description, $product_stock, $product_category, $product_type );
                echo $result;
                
            };
        }
    }
?>