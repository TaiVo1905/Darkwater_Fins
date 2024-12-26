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
        public function orderManagement() {
            $this->view("admin/orderManagement");
        }
        public function userManagement() {
            $this->model("User");
            $userModel = new UserModel();
            $data = $userModel->getAllUser();
            $this->view("admin/userManagement", $data);
        }
        public function productManagement() {
            $this->view("admin/productManagement");
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
    }
?>