<?php
    class ProductsModel extends Model {
        public function getAquariums () {
            $stmt = $this->db->prepare("SELECT * from aquariums");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAquariumFishes () {
            $stmt = $this->db->prepare("SELECT * from aquarium_fishs");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getFishFoods () {
            $stmt = $this->db->prepare("SELECT * from fish_foods");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>