<?php
    class ProductService {
        private $__model;

        public function __construct() {
            $this->__model = new Model();
        }

        // Fishes
        public function getTopPurchasedFishes() {
            $stmt = $this->__model->db->prepare("SELECT * FROM products WHERE product_type = 'Fish' AND deleted != ? ORDER BY purchases DESC LIMIT 4");
            $stmt->execute([1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }

        public function getproductsByType ($product_type) {
            $stmt = $this->__model->db->prepare("SELECT * FROM products WHERE product_type = '$product_type' AND deleted != ?");
            $stmt->execute([1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }

        public function getHighestPrice($product_type) {
            $stmt = $this->__model->db->prepare("SELECT product_price FROM products WHERE product_type = ? AND deleted != ? ORDER BY product_price DESC LIMIT 1");
            $stmt->execute([$product_type, 1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetch();
        }

        public function getCategories($product_type) {
            $stmt = $this->__model->db->prepare("SELECT DISTINCT product_category FROM products WHERE product_type = ? AND deleted != ?");
            $stmt->execute([$product_type, 1]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function searchProducts($searchQuery) {
            $stmt = $this->__model->db->prepare(
                "SELECT * FROM products 
                WHERE (product_type LIKE ?
                OR product_name LIKE ?
                OR product_sub LIKE ?
                OR product_description LIKE ?)
                AND deleted != ? "
            );
            $stmt->execute(['%'.$searchQuery.'%', '%'.$searchQuery.'%', '%'.$searchQuery.'%', '%'.$searchQuery.'%', 1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetch();
        }
        
        public function getProductById($id) {
            $stmt = $this->__model->db->prepare("SELECT * FROM products WHERE product_id = ? AND deleted != ?");
            $stmt->execute([$id, 1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetch();
        }
            
        public function filterProductsByPrice($price, $type) {
            $sql = "SELECT * FROM products WHERE product_price <= $price AND deleted != ?";
            if ($type) {
                $sql .= " AND product_type = '$type'";
            }
            $stmt = $this->__model->db->prepare($sql);
            $stmt->execute([1]); 
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }
           
        public function sortProducts($sortOption, $type) {
            $sql = "SELECT * FROM products";
            if ($type) {
                $sql .= " WHERE product_type = '$type' AND deleted != ?";
            } else {
                $sql .= " WHERE deleted != ?";
            }
            if ($sortOption == 2) {
                $sql .= " ORDER BY product_price DESC";
            } elseif ($sortOption == 3) {
                $sql .= " ORDER BY product_price ASC";
            }
            $stmt = $this->__model->db->prepare($sql);
            $stmt->execute([1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }

        public function filterProductsByCategory($categories) {
            $placeholders = implode(",", array_fill(0, count($categories), "?"));
            $stmt = $this->__model->db->prepare("SELECT * FROM products WHERE product_category IN ($placeholders) AND deleted != ?");
            $stmt->execute(array_merge($categories, [1]));
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }
        
        public function addProduct(ProductModel $product) {
            $stmt = $this->__model->db->prepare("INSERT INTO 
            products (product_name, product_img_url, product_price, product_sub, product_description, product_stock, product_category, product_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            return $stmt->execute([$product->getProductName(), $product->getProductImgUrl(), $product->getProductPrice(), $product->getProductSub(), $product->getProductDescription(), $product->getProductStock(), $product->getProductCategory(), $product->getProductType()]);
        }

        public function updateProduct($product_name, $product_img_url, $product_price, $product_stock, $product_sub, $product_description, $product_id){
            $stmt = $this->__model->db->prepare("UPDATE products SET product_name =?, product_img_url =?, product_price =?, product_stock =?, product_sub =?, product_description =? WHERE product_id =?");
            return $stmt->execute([$product_name, $product_img_url, $product_price, $product_stock, $product_sub, $product_description, $product_id]);
        }

        public function getAllProducts() {
            $stmt = $this->__model->db->prepare("SELECT * FROM products WHERE deleted != ?");
            $stmt->execute([1]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ProductModel");
            return $stmt->fetchAll();
        }

        public function removeProduct($product_id){
            $stmt =$this->__model->db->prepare("UPDATE products SET deleted = ? WHERE product_id = ? ");
            return $stmt->execute([1, $product_id]);
        }
    }
?>