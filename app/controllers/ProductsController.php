<?php
    class ProductsController extends Controller {
        private $productsModel;
        public function __construct() {
            $this->model("Products");
            $this->productsModel = new ProductsModel;
        }
        public function aquariums($id = null) {
            
            if($id = null){
                $aquariums = $this->productsModel->getAquariums();
                $this->view("aquarium", $aquariums);
            }
        }

        public function fishes($id = null) {
            if($id == null){
                $aquariumFishes = $this->productsModel->getAquariumFishes();
                $this->view("aquariumFish", $aquariumFishes);

            }
        }

        public function fishfoods($id = null) {
            if($id = null){
                $fishFoods = $this->productsModel->getFishFoods();
                $this->view("fishFood", $fishFoods);
            }
        }
    }
?>