<?php
    class OrderModel extends Model {
        public function getAllOrder() {
            $stmt = $this->db->prepare("SELECT * FROM orderView");
            $stmt->execute();
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
    }
?>