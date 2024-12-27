<?php
    class AdminController extends Controller {
        public function index() {
            $this->model("Order");
            $orderModel = new OrderModel();
            $data = $orderModel->getAllOrder();
            $this->view("admin/dashboard", $data);
        }
        public function getProductSoldPerMonth() {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->model("Order");
                $orderModel = new OrderModel();
                echo json_encode($orderModel->getProductSoldPerMonth());
            }
        }
        public function userManagement() {
            $this->model("User");
            $userModel = new UserModel();
            $data = $userModel->getAllUserNotBan();
            $this->view("admin/userManagement", $data);
        }
        public function productManagement() {
            $this->model("Products");
            $productModel = new ProductsModel();
            $data = $productModel->getAllProduct();
            $this->view("admin/productManagement", $data);
        }
        public function orderManagement() {
            $this->model("Order");
            $orderModel = new OrderModel();
            $data = $orderModel->getAllOrderNotPending();
            $this->view("admin/orderManagement", $data);
        }
        public function updateUserRole() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['userId'];
                $role = $_POST['role'] === 'Admin' ? 1 : 0;
                $this->model('User');
                $userModel = new UserModel();
                $success = $userModel->updateRole($userId, $role);
                if($success){
                    echo $role ;
                };
            }
        }
        public function banUser() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $this->model('User');
                $userModel = new UserModel();
                echo json_encode($userModel->banUser($request["user_id"]));
            }
        }
        public function pendingOrder() {
            $this->model("Order");
            $orderModel = new OrderModel();
            $data = $orderModel->getAllOrderPending();
            $this->view("admin/pendingOrder", $data);
        }
        public function changeOrderStatus() {
            if($_SERVER["REQUEST_METHOD"] = "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $this->model("Order");
                $orderModel = new OrderModel();
                echo json_encode($orderModel->changeOrderStatus($request["order_id"], $request["orderStatus"]));
            }
        }

        public function getOrderById($order_id) {
            if($_SERVER["REQUEST_METHOD"] = "GET") {
                $order_id = json_decode($order_id);
                $this->model("Order");
                $orderModel = new OrderModel();
                echo json_encode($orderModel->getOrderById($order_id));
            }

        }
        public function addProducts() {
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
        public function showInfoProduct($id) {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $this->model('Products');
                $productModel = new ProductsModel();
                $product = $productModel->getProductById($id);
                header('Content-Type: application/json');
                echo json_encode($product);
            }
        }
        public function updateProduct() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->model("Products");
                $productModel = new ProductsModel();
                $product_id = $_POST["productId"];
                $product = $productModel->getProductById($product_id);
                $product_name = $_POST["productName"];
                $uploadDir = './public/images/uploads/';
                $product_img = $product->product_img_url;  
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
                $product_price = $_POST["productPrice"];
                $product_sub = $_POST["productSub"];
                $product_description = $_POST["productDescription"];
                $product_stock = $_POST["productStock"];
                $result = $productModel -> updateProduct($product_name, $product_img, $product_price, $product_stock, $product_sub, $product_description, $product_id);
                echo $result;
            }
        }
        public function deleteProduct($product_id ){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $this -> model('Products');
                $product = new ProductsModel();          
                if($product_id){
                    $product -> removeProduct($product_id);
                }
            }
        }
    }
?>