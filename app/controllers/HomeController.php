<?php
class HomeController extends Controller {
    public function index() {
        $this->service('Product');
        $productService = new ProductService();
        $topFishes = $productService->getTopPurchasedFishes();
        $this->view('users/home', $topFishes);
    }
}
?>
