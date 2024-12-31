<?php
    class ShoppingCartController extends Controller {
        private $__cartService;
        
        public function __construct() {
            $this->service("Cart");
            $this->__cartService = new CartService();
        }

        public function index() {
            $items = $this->__cartService->shoppingCart($_SESSION["user_id"]);
            $countItems = $this->__cartService->countItems($_SESSION["user_id"]);
            $this->view("shoppingCarts/shoppingCart", [$items, $countItems]);
        }

        public function addToCart() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $response = $this->__cartService->addToCart($_SESSION["user_id"], $request["product_id"]);
                echo json_encode($response);
            }
        }

        public function changeQuantityCart() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $response = $this->__cartService->changeQuantityCart($_SESSION["user_id"], $request["product_id"], $request["quantity"]);
                echo json_encode($response);
            }
        }

        public function removeCart() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $response = $this->__cartService->removeCart($_SESSION["user_id"], $request["product_id"]);
                echo $response;
            }
        }

        public function countItems() {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                $countItems = $this->__cartService->countItems($_SESSION["user_id"]);
                echo $countItems->totalQuantity;
            }
        }
    }
?>