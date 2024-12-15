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
                $aquariumFishes = $this->productsModel->getAquariumFishes();
                $highestPrice = $this->productsModel->getHighestFishPrice()->fish_price;
                $categories = $this->productsModel->getFishCategories();
                $this->view("products", [$aquariumFishes, $highestPrice, $categories]);
            }
        }

        public function aquariums($id = null) {
            if($id == null){
                $aquariums = $this->productsModel->getAquariums();
                $highestPrice = $this->productsModel->getHighestAquariumPrice()->aquarium_price;
                $categories = $this->productsModel->getAquariumCategories();
                $this->view("products", [$aquariums, $highestPrice, $categories]);
            }
        }


        public function fishFoods($id = null) {
            if($id == null){
                $fishFoods = $this->productsModel->getFishFoods();
                $highestPrice = $this->productsModel->getHighestFoodPrice()->fishFood_price;
                $categories = $this->productsModel->getFoodCategories();
                $this->view("products", [$fishFoods, $highestPrice, $categories]);
            }
        }
    }
?>