<?php
class CheckoutController extends Controller {
    public function index() {
        $this->model("User");
        $userModel = new UserModel();
        $product_list = $userModel->getProductBeforCheckout($_SESSION["user_id"], $_SESSION["product_id_list"]);
        $user = $userModel->getUser($_SESSION["user_id"]);
        $this->view('checkout', [$product_list, $user]);
    }
}
?>