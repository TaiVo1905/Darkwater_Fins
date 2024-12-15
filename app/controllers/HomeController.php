<?php
class HomeController extends Controller {
    public function index() {
        $this->model('Products');
        $productsModel = new ProductsModel();
        $topFishes = $productsModel->getTopPurchasedFishes();
        $this->view('home', $topFishes);
    }
}
?>
