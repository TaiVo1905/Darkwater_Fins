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
    }
?>