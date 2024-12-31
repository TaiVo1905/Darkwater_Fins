<?php
    require_once("./app/services/UserService.php");
    require_once("./app/services/ProductService.php");
    class CartService {
        private $__model;

        public function __construct() {
            $this->__model = new Model();
        }

        public function shoppingCart($user_id) {
            $stmt = $this->__model->db->prepare("SELECT * FROM cart AS c
                                        JOIN products AS p
                                        ON c.product_id = p.product_id WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "CartModel");
            $carts = $stmt->fetchAll();
            $user = new UserService();
            $user = $user->getUserById($user_id);
            foreach ($carts as $cart) {
                $product = new ProductService();
                $product = $product->getProductById($product_id);
                $cart->setUser($user);
                $cart->setProduct($product);
                unset($cart->user_id,
                    $cart->$__product_id,
                    $cart->$__product_name,
                    $cart->$__product_img_url,
                    $cart->$__product_price,
                    $cart->$__product_sub,
                    $cart->$__product_description,
                    $cart->$__product_stock,
                    $cart->$__product_category,
                    $cart->$__product_type,
                    $cart->$__purchases,
                    $cart->$__deleted);
            }
            return $carts;
        }

        public function changeQuantityCart($user_id, $product_id, $quantity) {
            try{
                $stmt = $this->__model->db->prepare("UPDATE cart SET quantity = ? where user_id = ? AND product_id = ?");
                $stmt->execute([$quantity, $user_id, $product_id]);
                return [
                    "status" => "success"
                ];
            } catch(PDOException $e) {
                return [
                    "status" => "fall",
                    "code" => $e->getCode(),
                    "message" => $e->getMessage()
                ];
            }
        }

        public function removeCart($user_id, $product_id) {
            $stmt = $this->__model->db->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            return $stmt->execute([$user_id, $product_id]);
        }

        public function countItems($user_id) {
            $stmt = $this->__model->db->prepare("SELECT sum(quantity) AS totalQuantity FROM cart WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "CartModel");
            return $stmt->fetch();
        }

        private function getCart($user_id, $product_id) {
            $stmt = $this->__model->db->prepare("SELECT count(*) AS hasItem FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$user_id, $product_id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function addToCart($user_id, $product_id) {
            try{
                if($this->__model->getCart($user_id, $product_id)->hasItem != 0) {
                    $stmt = $this->__model->db->prepare("UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?");
                    $stmt->execute([1, $user_id, $product_id]);
                } else {
                    $stmt = $this->__model->db->prepare("INSERT INTO cart(user_id, product_id, quantity) VALUE (?, ?, ?)");
                    $stmt->execute([$user_id, $product_id, 1]);
                }
                return [
                    "status" => "success"
                ];
            } catch(PDOException $e) {
                return [
                    "status" => "fall",
                    "code" => $e->getCode(),
                    "message" => $e->getMessage()
                ];
            }
        }
    }
?>