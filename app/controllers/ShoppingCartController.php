<?php
    class ShoppingCartController extends Controller {
        public function index() {
            $this->model("User");
            $userModel = new UserModel();
            $data = $userModel->shoppingCart($_SESSION["user_id"]);
            $this->view("shoppingCart", $data);
        }
    }
?>