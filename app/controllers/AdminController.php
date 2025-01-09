<?php
    require_once("./app/models/ProductModel.php");
    class AdminController extends Controller {
        private $__userService;
        private $__orderService;
        private $__productService;

        public function __construct() {
            $this->service("User");
            $this->service("Order");
            $this->service("Product");
            $this->__userService = new UserService();
            $this->__orderService = new OrderService();
            $this->__productService = new ProductService();
        }

        public function index() {
            $data = $this->__orderService->getAllOrder();
            $this->view("admin/dashboard", $data);
        }

        public function getProductSoldPerMonth() {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                echo json_encode($this->__orderService->getProductSoldPerMonth());
            }
        }

        public function userManagement() {
            $data = $this->__userService->getAllUserNotBan();
            $this->view("admin/userManagement", $data);
        }

        public function productManagement() {
            $data = $this->__productService->getAllProducts();
            $this->view("admin/productManagement", $data);
        }

        public function orderManagement() {
            $data = $this->__orderService->getAllOrderNotPending();
            $this->view("admin/orderManagement", $data);
        }

        public function updateUserRole() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['userId'];
                $role = $_POST['role'] === 'Admin' ? 1 : 0;
                $success = $this->__userService->updateRole($userId, $role);
                if($success){
                    echo $role;
                };
            }
        }

        public function banUser() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                echo json_encode($this->__userService->banUser($request["user_id"]));
            }
        }

        public function pendingOrder() {
            $data = $this->__orderService->getAllOrderPending();
            $this->view("admin/pendingOrder", $data);
        }

        public function changeOrderStatus() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                echo json_encode($this->__orderService->changeOrderStatus($request["order_id"], $request["orderStatus"]));
            }
        }

        public function getOrderById($order_id) {
            if($_SERVER["REQUEST_METHOD"] === "GET") {
                $data = $this->__orderService->getOrderById($order_id);
                $dataJson = [];
                foreach ($data as $value) {
                    array_push($dataJson, $value->returnDataJson());
                }
                echo json_encode($dataJson);
            }

        }

        public function addProducts() {
            $this->view("admin/addProduct");
        }

        public function handelAddProduct(){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $product_name = $_POST["productName"];
                $uploadDir = './public/images/uploads/';
                $product_img_url = null;  
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['image']['name']);
                    $currentTime = date("Y-m-d-H-i-s");
                    $filePath = $uploadDir . $currentTime.str_replace(['$', '/', ':'], '', password_hash($fileName, PASSWORD_BCRYPT));;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                        $product_img_url = $filePath;          
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
                $product = new ProductModel($product_name, $product_img_url, $product_price, $product_sub, $product_description, $product_stock, $product_category, $product_type);
                $result = $this->__productService->addProduct($product);
                echo $result;
                
            };
        }

        public function showInfoProduct($id) {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $product = $this->__productService->getProductById($id);
                header('Content-Type: application/json');
                echo json_encode($product->returnDataJson());
            }
        }

        public function updateProduct() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $product_id = $_POST["productId"];
                $product = $this->__productService->getProductById($product_id);
                $product_name = $_POST["productName"];
                $uploadDir = './public/images/uploads/';
                $product_img_url = $product->product_img_url;  
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['image']['name']);
                    $currentTime = date("Y-m-d-H-i-s");
                    $filePath = $uploadDir . $currentTime.str_replace(['$', '/', ':'], '', password_hash($fileName, PASSWORD_BCRYPT));;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                        $product_img_url = $filePath;          
                    } else {
                        echo "<p style='color: red;'>Failed to upload image.</p>";
                    }
                }
                $product_price = $_POST["productPrice"];
                $product_sub = $_POST["productSub"];
                $product_description = $_POST["productDescription"];
                $product_stock = $_POST["productStock"];
                $result = $this->__productService -> updateProduct($product_name, $product_img_url, $product_price, $product_stock, $product_sub, $product_description, $product_id);
                echo $result;
            }
        }

        public function deleteProduct($product_id ){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){       
                if($product_id){
                    $this->__productService->removeProduct($product_id);
                }
            }
        }
    }
?>