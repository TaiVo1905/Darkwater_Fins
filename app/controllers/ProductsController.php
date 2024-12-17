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
            }
        }

        public function aquariums($id = null) {
            if($id == null){
                $aquariums = $this->productsModel->getProducts("Aquarium");
                $highestPrice = $this->productsModel->getHighestPrice("Aquarium")->product_price;
                $categories = $this->productsModel->getCategories("Aquarium");
                $this->view("products", [$aquariums, $highestPrice, $categories]);
            }
        }


        public function fishFoods($id = null) {
            if($id == null){
                $fishFoods = $this->productsModel->getProducts("Fish Food");
                $highestPrice = $this->productsModel->getHighestPrice("Fish Food")->product_price;
                $categories = $this->productsModel->getCategories("Fish Food");
                $this->view("products", [$fishFoods, $highestPrice, $categories]);
            }
        }
    }
?>