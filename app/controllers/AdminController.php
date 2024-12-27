<?php
    class AdminController extends Controller {
        public function pendingOrder() {
            $this->model("Order");
            $orderModel = new OrderModel();
            $data = $orderModel->getAllOrderPending();
            $this->view("admin/pendingOrder", $data);
        }
        public function orderManagement() {
            $this->model("Order");
            $orderModel = new OrderModel();
            $data = $orderModel->getAllOrderNotPending();
            $this->view("admin/orderManagement", $data);
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
        public function userManagement() {
            $this->view("admin/userManagement");
        }
        public function productManagement() {
            $this->view("admin/productManagement");
        }
    }
?>