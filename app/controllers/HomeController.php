<?php
class HomeController extends Controller {
    public function index() {
        $this->service('Product');
        $productService = new ProductService();
        $topFishes = $productService->getTopPurchasedFishes();
        $this->view('users/home', $topFishes);
    }
    public function contactUs() {
        $this->view('users/contact');
    }
    public function aboutUs() {
        $this->service('Product');
        $productService = new ProductService();
        $topFishes = $productService->getTop6PurchasedFishes();
        $this->view('users/aboutUs', $topFishes);
    }
}
?>
