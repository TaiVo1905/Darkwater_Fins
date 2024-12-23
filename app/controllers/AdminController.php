<?php
class AdminController extends Controller {
    public function index() {
        $this->model('Products');
        $productsModel = new ProductsModel();
        $topFishes = $productsModel->getTopPurchasedFishes();
        $this->view('users/admin', $topFishes);
    }
}
?>
