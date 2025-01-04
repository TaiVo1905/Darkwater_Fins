<?php
class CheckoutController extends Controller {
    private $__userService;

    public function __construct() {
        $thi->service("User");
        $__userService = new userService();
    }

    public function index() {
        $product_list = $this->__userService->getProductBeforCheckout($_SESSION["user_id"], $_SESSION["product_id_list"]);
        $user = $this->__userService->getUser($_SESSION["user_id"]);
        $this->view('checkout/checkout', [$product_list, $user]);
    }

    public function completedOrder() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            echo json_encode($this->__userService->completedOrder($_SESSION["user_id"], $_SESSION["product_id_list"], $_SESSION["info_checkout"]));
        }
    }

    public function success() {
        $this->view('checkout/success');
    }

    public function storeProductIdBeforeCheckout() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $jsonData = file_get_contents("php://input");
            $request = json_decode($jsonData, true);
            $_SESSION["product_id_list"] = $request;
            echo true;
        }
    }

    public function saveInfoCheckout() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            try{
                $jsonData = file_get_contents("php://input");
                $request = json_decode($jsonData, true);
                $_SESSION["info_checkout"] = $request;
                echo true;
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function deleteOrder($order_id ){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){       
            if($order_id){
                $this->__userService -> removeOrder($order_id);
            }
        }
    }
}
?>