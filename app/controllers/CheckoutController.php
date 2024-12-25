<?php
class CheckoutController extends Controller {
    public function index() {
        $this->model("User");
        $userModel = new UserModel();
        $product_list = $userModel->getProductBeforCheckout($_SESSION["user_id"], $_SESSION["product_id_list"]);
        $user = $userModel->getUser($_SESSION["user_id"]);
        $this->view('checkout/checkout', [$product_list, $user]);
    }

    public function completedOrder() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model("User");
            $userModel = new UserModel();
            echo json_encode($userModel->completedOrder($_SESSION["user_id"], $_SESSION["product_id_list"], $_SESSION["info_checkout"]));
        }
    }

    public function success() {
        $this->view('checkout/success');
    }
}
?>