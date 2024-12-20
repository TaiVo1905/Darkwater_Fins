<?php
    class ShoppingCartController extends Controller {
        public function index() {
            $this->model("User");
            $userModel = new UserModel();
            $items = $userModel->shoppingCart($_SESSION["user_id"]);
            $countItems = $userModel->countItems($_SESSION["user_id"]);
            $this->view("shoppingCart", [$items, $countItems]);
        }

        public function changeQuantityCart() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $this->model("User");
                $userModel = new UserModel();
                $response = $userModel->changeQuantityCart($_SESSION["user_id"], $request["product_id"], $request["quantity"]);
                echo json_encode($response);
            }
        }

        public function removeCart() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $this->model("User");
                $userModel = new UserModel();
                $response = $userModel->removeCart($_SESSION["user_id"], $request["product_id"]);
                echo $response;
            }
        }

        public function countItems() {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->model("User");
                $userModel = new UserModel();
                $countItems = $userModel->countItems($_SESSION["user_id"]);
                echo $countItems->totalQuantity;
            }
        }

        //checkout
        public function storeProductIdBeforCheckout() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $_SESSION["product_id_list"] = $request;
                echo true;
            }
        }
    }
?>