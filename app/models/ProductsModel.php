<?php
    class ProductsModel extends Model {
        // Fishes
        public function getTopPurchasedFishes() {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE product_type = 'Fish' ORDER BY purchases DESC LIMIT 4");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getproducts ($produc_type) {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE product_type = '$produc_type'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getHighestPrice($produc_type) {
            $stmt = $this->db->prepare("SELECT product_price FROM products WHERE product_type = '$produc_type' ORDER BY product_price DESC LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function getCategories($produc_type) {
            $stmt = $this->db->prepare("SELECT DISTINCT product_category FROM products WHERE product_type = '$produc_type'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function searchProducts($searchQuery, $productType) {
            $stmt = $this->db->prepare(
                "SELECT * FROM products 
                WHERE product_type = :productType 
                AND product_name LIKE :searchQuery"
            );
            $stmt->execute([
                'productType' => $productType,
                'searchQuery' => '%' . $searchQuery . '%'
            ]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function getProductById($id) {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE product_id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }     
        public function filterProductsByPrice($price, $type) {
            $sql = "SELECT * FROM products WHERE product_price <= $price";
            if ($type) {
                $sql .= " AND product_type = '$type'";
            }
            $stmt = $this->db->prepare($sql);
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
           
        public function sortProducts($sortOption, $type) {
            $sql = "SELECT * FROM products";
            if ($type) {
                $sql .= " WHERE product_type = '$type'";
            }
            if ($sortOption == 2) {
                $sql .= " ORDER BY product_price DESC";
            } elseif ($sortOption == 3) {
                $sql .= " ORDER BY product_price ASC";
            }
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }              
        public function filterProductsByCategory($categories) {
            $placeholders = implode(",", array_fill(0, count($categories), "?"));
            $stmt = $this->db->prepare("SELECT * FROM products WHERE product_category IN ($placeholders)");
            $stmt->execute($categories);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
          
    }
?>