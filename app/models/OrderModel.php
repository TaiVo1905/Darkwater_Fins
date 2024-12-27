<?php
    class OrderModel extends Model {
        public function getAllOrder() {
            $stmt = $this->db->prepare("SELECT * FROM orderView");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllOrderPending() {
            $stmt = $this->db->prepare("SELECT DISTINCT order_id, receiver, phone_number, order_date, total_price FROM orderView WHERE order_status = ?");
            $stmt->execute(["Pending"]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllOrderNotPending() {
            $stmt = $this->db->prepare("SELECT DISTINCT order_id, receiver, phone_number, order_date, order_status, total_price FROM orderView WHERE order_status != ?");
            $stmt->execute(["Pending"]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getProductSoldPerMonth() {
            $stmt = $this->db->prepare("SELECT month(order_date) AS month, sum(quantity) AS quantity
                                        FROM orderView
                                        WHERE  year(order_date) = year(now())
                                        ORDER BY month");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function changeOrderStatus($order_id, $orderStatus) {
            try {
                $stmt = $this->db->prepare("UPDATE orders set order_status = ? where order_id = ?");
                return $stmt->execute([$orderStatus, $order_id]);
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        public function getOrderById($order_id) {
            try {
                $stmt = $this->db->prepare("SELECT * FROM orderView WHERE order_id = ?");
                $stmt->execute([$order_id]);
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>