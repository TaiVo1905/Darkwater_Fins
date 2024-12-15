<?php
    class ProductsModel extends Model {
        // Fishes
        public function getTopPurchasedFishes() {
            $stmt = $this->db->prepare("SELECT * FROM Aquarium_Fishs ORDER BY purchases DESC LIMIT 4");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAquariumFishes () {
            $stmt = $this->db->prepare("SELECT * FROM aquarium_fishs");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getHighestFishPrice() {
            $stmt = $this->db->prepare("SELECT fish_price FROM aquarium_fishs ORDER BY fish_price DESC LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function getFishCategories() {
            $stmt = $this->db->prepare("SELECT DISTINCT fish_category FROM aquarium_fishs");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Aquariums
        public function getAquariums () {
            $stmt = $this->db->prepare("SELECT * FROM aquariums");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function getHighestAquariumPrice() {
            $stmt = $this->db->prepare("SELECT aquarium_price FROM aquariums ORDER BY aquarium_price DESC LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function getAquariumCategories() {
            $stmt = $this->db->prepare("SELECT DISTINCT aquarium_category FROM aquariums");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Fish foods
        public function getFishFoods () {
            $stmt = $this->db->prepare("SELECT * FROM fish_foods");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getHighestFoodPrice() {
            $stmt = $this->db->prepare("SELECT fishFood_price FROM fish_foods ORDER BY fishFood_price DESC LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function getFoodCategories() {
            $stmt = $this->db->prepare("SELECT DISTINCT fishFood_category FROM fish_foods");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>