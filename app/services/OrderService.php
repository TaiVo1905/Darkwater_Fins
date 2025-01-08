<?php
    require_once("./app/services/UserService.php");
    require_once("./app/services/ProductService.php");
    class OrderService {
        private $__model;

        public function __construct() {
            $this->__model = new Model();
        }
        public function getAllOrder() {
            $stmt = $this->__model->db->prepare("SELECT * FROM orderView");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "OrderViewModel");
            return $stmt->fetchAll();
        }

        public function getAllOrderPending() {
            $stmt = $this->__model->db->prepare("SELECT DISTINCT order_id, receiver, phone_number, order_date, total_price FROM orderView WHERE order_status = ?");
            $stmt->execute(["Pending"]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "OrderViewModel");
            return $stmt->fetchAll();
        }

        public function getAllOrderNotPending() {
            $stmt = $this->__model->db->prepare("SELECT DISTINCT order_id, receiver, phone_number, order_date, order_status, total_price FROM orderView WHERE order_status != ?");
            $stmt->execute(["Pending"]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "OrderViewModel");
            return $stmt->fetchAll();
        }

        public function getProductSoldPerMonth() {
            $stmt = $this->__model->db->prepare("SELECT month(order_date) AS month, sum(quantity) AS quantity
                                        FROM orderView
                                        WHERE  year(order_date) = year(now())
                                        ORDER BY month");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function changeOrderStatus($order_id, $orderStatus) {
            try {
                $stmt = $this->__model->db->prepare("UPDATE orders set order_status = ? where order_id = ?");
                return $stmt->execute([$orderStatus, $order_id]);
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        public function getOrderById($order_id) {
            try {
                $stmt = $this->__model->db->prepare("SELECT * FROM orderView WHERE order_id = ?");
                $stmt->execute([$order_id]);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "OrderViewModel");
                return $stmt->fetchAll();
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        public function getOrder($user_id){
            $stmt = $this->__model->db->prepare("SELECT 
                                                o.order_id,
                                                o.order_status, 
                                                p.product_img_url, 
                                                p.product_name, 
                                                p.product_category, 
                                                od.quantity, 
                                                p.product_price, 
                                                o.total_price
                                            FROM 
                                                orders AS o
                                            JOIN 
                                                order_details AS od ON od.order_id = o.order_id
                                            JOIN 
                                                products AS p ON p.product_id = od.product_id
                                            WHERE 
                                                o.user_id = ?;
                                            ");
            $stmt->execute([$user_id]); //true false
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "OrderViewModel");
            return $stmt->fetchAll();                          
        }

        public function removeOrder($order_id){
            $stmt = $this ->__model->db->prepare("UPDATE ORDERS SET ORDER_STATUS = 'canceled' WHERE ORDER_ID = ?");
            return $stmt->execute([$order_id]);
        }

        public function getProductBeforeCheckout($user_id, $product_id_list) {
            $place = implode(", ", array_fill(0, count($product_id_list), "?"));
            $stmt = $this->__model->db->prepare("SELECT * FROM cart AS c
                                        JOIN products AS p
                                        ON c.product_id = p.product_id WHERE c.user_id = ? AND c.product_id IN ($place)");
            $stmt->execute(array_merge([$user_id], $product_id_list));
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "CartModel");
            $carts = $stmt->fetchAll();
            $user = new UserService();
            $user = $user->getUserById($user_id);
            foreach ($carts as $cart) {
                $product = new ProductService();
                $product = $product->getProductById($cart->product_id);
                $cart->setUser($user);
                $cart->setProduct($product);
                unset($cart->user_id,
                    $cart->product_id,
                    $cart->product_name,
                    $cart->product_img_url,
                    $cart->product_price,
                    $cart->product_sub,
                    $cart->product_description,
                    $cart->product_stock,
                    $cart->product_category,
                    $cart->product_type,
                    $cart->purchases,
                    $cart->deleted);
            }
            return $carts;  
        }

        public function completedOrder($user_id ,$product_id_list, $info_checkout) {
            try {
                $this->__model->db->beginTransaction();
                $itemCheckouts = $this->getProductBeforeCheckout($user_id ,$product_id_list);
                $stmt = $this->__model->db->prepare("INSERT INTO orders(user_id, order_status, order_date) VALUE (?, 'pending', NOW())");
                $stmt->execute([$user_id]);

                $stmt = $this->__model->db->prepare("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
                $stmt->execute();
                $order_id = $stmt->fetch(PDO::FETCH_OBJ)->order_id;

                $stmt = $this->__model->db->prepare("INSERT INTO order_details(order_id, product_id, price, quantity) VALUE (?, ?, ?, ?)");
                foreach($itemCheckouts as $item) {
                    $stmt->execute([$order_id, $item->getProduct()->getProductId(), $item->getProduct()->getProductPrice(), $item->getQuantity()]);
                }

                $stmt = $this->__model->db->prepare("INSERT INTO shipping(order_id, phone_number, address, receiver) VALUE (?, ?, ?, ?)");
                $stmt->execute([$order_id, $info_checkout["phone_number"], $info_checkout["address"], $info_checkout["username"]]);

                $stmt = $this->__model->db->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
                foreach($product_id_list as $id) {
                    $stmt->execute([$user_id, $id]);
                }
                $this->__model->db->commit();
                return [
                    "status" => "success"
                ];
            } catch(PDOException $e) {
                $this->__model->db->rollback();
                return [
                    "status" => "fall",
                    "code" => $e->getCode(),
                    "message" => $e->getMessage()
                ];
            }
        }
    }
?>