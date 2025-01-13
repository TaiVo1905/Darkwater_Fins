<?php
    require_once("./app/models/UserCommentModel.php");
    class ProductsController extends Controller {
        private $__productService;
        private $__userService;

        public function __construct() {
            $this->service("Product");
            $this->service("User");
            $this->__productService = new ProductService();
            $this->__userService = new UserService();
        }

        public function fishes($id = null) {
            if($id == null){
                $aquariumFishes = $this->__productService->getProductsByType("Fish");
                $highestPrice = $this->__productService->getHighestPrice("Fish")->getProductPrice();
                $categories = $this->__productService->getCategories("Fish");
                $this->view("products/products", [$aquariumFishes, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }

        public function aquariums($id = null) {
            if($id == null){
                $aquariums = $this->__productService->getProductsByType("Aquarium");
                $highestPrice = $this->__productService->getHighestPrice("Aquarium")->getProductPrice();
                $categories = $this->__productService->getCategories("Aquarium");
                $this->view("products/products", [$aquariums, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }

        public function fishFoods($id = null) {
            if($id == null){
                $fishFoods = $this->__productService->getProductsByType("Fish Food");
                $highestPrice = $this->__productService->getHighestPrice("Fish Food")->getProductPrice();
                $categories = $this->__productService->getCategories("Fish Food");
                $this->view("products/products", [$fishFoods, $highestPrice, $categories]);
            } else {
                $this->detail($id);
            }
        }

        public function search() {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $searchQuery = $_GET['search_query'];
                $data = $this->__productService->searchProducts($searchQuery, $searchQuery, $searchQuery, $searchQuery);
                $this->view("products/search", $data);
            }
        }  

        private function detail($id) {
            $product = $this->__productService->getProductById($id);
            $userComments = $this->__productService->getUserComment($id) ?? null;
            $user =  isset($_SESSION["user_id"]) ? $this->__userService->getUserById($_SESSION["user_id"]) : null;
            $this->view("products/detail", [$product, $userComments, $user]);
        }

        public function filterByPrice($price=null, $type=null) {
            $price = $_GET['price'] ?? null;
            $type = $_GET['type'] ?? null;
            if ($price) {
                $filteredProducts = $this->__productService->filterProductsByPrice($price, $type);
                $dataJson = [];
                foreach ($filteredProducts as $value) {
                    array_push($dataJson, $value->returnDataJson());
                }
                echo json_encode($dataJson);
            } else {
                echo json_encode([]);
            }
        }

        public function sortProducts($sortOption = null, $type = null) {
            $sortOption = $_GET['sort'] ?? null;
            $type = $_GET['type'] ?? null;
            if ($sortOption) {
                $sortedProducts = $this->__productService->sortProducts($sortOption, $type);
                $dataJson = [];
                foreach ($sortedProducts as $value) {
                    array_push($dataJson, $value->returnDataJson());
                }
                echo json_encode($dataJson);
            } else {
                echo json_encode([]);
            }
        }

        public function filterByCategory($categories = null) {
            $categories = $_GET['categories'] ?? '[]';
            $categories = json_decode($categories, true);
            if ($categories && is_array($categories) && count($categories) > 0) {
                $filteredProducts = $this->__productService->filterProductsByCategory($categories);
                $dataJson = [];
                foreach ($filteredProducts as $value) {
                    array_push($dataJson, $value->returnDataJson());
                }
                echo json_encode($dataJson);
            } else {
                echo json_encode([]);
            }
        } 
        
        public function postComment() {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_id = $_POST['user_id'];
                $product_id = $_POST['product_id'];
                $comment_content = $_POST['comment_content'];
                $date_create = $_POST['date_create'];
                $user = $this->__userService->getUserById($user_id);
                $product = $this->__productService->getProductById($product_id);
                $comment = new UserCommentModel($user, $product, $comment_content, $date_create);
                echo $this->__productService->postComment($comment);
            } else {
                echo 0;
            }
        }
    }
?>