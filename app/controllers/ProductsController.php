<?php
    class ProductsController extends Controller {
        private $productsModel;
        public function __construct() {
            $this->model("Products");
            $this->productsModel = new ProductsModel;
        }

        // Fishes
        public function fishes($id = null) {
            if($id == null){
                $aquariumFishes = $this->productsModel->getProducts("Fish");
                $highestPrice = $this->productsModel->getHighestPrice("Fish")->product_price;
                $categories = $this->productsModel->getCategories("Fish");
                $this->view("products", [$aquariumFishes, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }

        public function aquariums($id = null) {
            if($id == null){
                $aquariums = $this->productsModel->getProducts("Aquarium");
                $highestPrice = $this->productsModel->getHighestPrice("Aquarium")->product_price;
                $categories = $this->productsModel->getCategories("Aquarium");
                $this->view("products", [$aquariums, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }


        public function fishFoods($id = null) {
            if($id == null){
                $fishFoods = $this->productsModel->getProducts("Fish Food");
                $highestPrice = $this->productsModel->getHighestPrice("Fish Food")->product_price;
                $categories = $this->productsModel->getCategories("Fish Food");
                $this->view("products", [$fishFoods, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }
        public function search() {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $searchQuery = $_GET['search_query'];
                $data = $this->productsModel->searchProducts($searchQuery, $searchQuery, $searchQuery, $searchQuery);
                $this->view("search", $data);
            }
        }  
        private function detail($id) {
            $product = $this->productsModel->getProductById($id);
            if (!$product) {
                header("Location: /404");
                exit;
            }
            $this->view("detail", [$product]);
        }
          public function filterByPrice($price=null, $type=null) {
            $price = $_GET['price'] ?? null;
            $type = $_GET['type'] ?? null;
            if ($price) {
                $filteredProducts = $this->productsModel->filterProductsByPrice($price, $type);
                echo json_encode($filteredProducts);
            } else {
                echo json_encode([]);
            }
        }

        public function sortProducts($sortOption=null, $type=null) {
            $sortOption = $_GET['sort'] ?? null;
            $type = $_GET['type'] ?? null;
            if ($sortOption) {
                $sortedProducts = $this->productsModel->sortProducts($sortOption, $type);
                echo json_encode($sortedProducts);
            } else {
                echo json_encode([]);
            }
        }
        public function filterByCategory($categories = null) {
            $categories = $_GET['categories'] ?? '[]';
            $categories = json_decode($categories, true);  
            if ($categories && is_array($categories) && count($categories) > 0) {
                $filteredProducts = $this->productsModel->filterProductsByCategory($categories);
                echo json_encode($filteredProducts);
            } else {
                echo json_encode([]);
            }
        }
        
    }
?>