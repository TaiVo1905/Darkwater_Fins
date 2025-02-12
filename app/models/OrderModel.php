<?php
    #[AllowDynamicProperties]
    class OrderModel {
        private $order_id;
        private $user;
        private $total_price;
        private $order_status;
        private $order_date;
        public function __construct (UserModel $user = null, $total_price = null, $order_status = null, $order_date = null, ShippingModel $shipping = null) {
            $this->user = $user;
            $this->total_price = $total_price;
            $this->order_status = $order_status;
            $this->order_date = $order_date;
            $this->shipping = $shipping;
        }

        //Getter
        public function getOrderId() {
            return $this->order_id;
        }
        public function getUser() {
            return $this->user;
        }
        public function getTotalPrice() {
            return $this->total_price;
        }
        public function getOrderStatus() {
            return $this->order_status;
        }
        public function getOrderDate() {
            return $this->order_date;
        }
        public function getShipping() {
            return $this->shipping;
        }

        //Setter
        public function setUser(UserModel $user) {
            $this->user = $user;
        }
        public function setTotalPrice($total_price) {
            if ($total_price <= 0) {
                throw new Exception("Total price cannot be negative.");
            }
            $this->total_price = $total_price;
        }
        public function setOrderStatus($order_status) {
            $valid_statuses = ['pending', 'shipping', 'shipped', 'canceled'];
            if (!in_array($order_status, $valid_statuses)) {
                throw new Exception("Invalid order status.");
            }
            $this->order_status = $order_status;
        }
        public function setOrderDate($order_date) {
            $this->order_date = $order_date;
        }
        public function setShipping(ShippingModel $shipping) {
            $this->shipping = $shipping;
        }
    }
?>