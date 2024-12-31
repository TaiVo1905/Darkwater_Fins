<?php
    #[AllowDynamicProperties]
    class OrderViewViewModel {
        private $order_id;
        private $user;
        private $total_price;
        private $order_status;
        private $order_date;
        private $receiver;
        private $address;
        private $phone_number;
        private $product_name;
        private $quantity;
        private $product_price;

        public function __construct ($order_id = null,
                                    UserModel $user = null,
                                    $total_price = null,
                                    $order_status = null,
                                    $order_date = null,
                                    $receiver = null,
                                    $address = null,
                                    $phone_number = null,
                                    $product_name = null,
                                    $quantity = null,
                                    $product_price = null) {
            $this->order_id = $order_id;
            $this->user = $user;
            $this->total_price = $total_price;
            $this->order_status = $order_status;
            $this->order_date = $order_date;
            $this->receiver = $receiver;
            $this->address = $address;
            $this->phone_number = $phone_number;
            $this->product_name = $product_name;
            $this->quantity = $quantity;
            $this->product_price = $product_price;
        }

        //Getter
        public function getOrderId() {
            return $this->order_id;
        }
        public function getUser() {
            return $this->user;
        }
        public function getToltalPrice() {
            return $this->total_price;
        }
        public function getOrderStatus() {
            return $this->order_status;
        }
        public function getOrderDate() {
            return $this->order_date;
        }
        public function getReceiver() {
            return $this->receiver;
        }
        public function getAddress() {
            return $this->address;
        }
        public function getPhoneNumber() {
            return $this->phone_number;
        }
        public function getProductName() {
            return $this->product_name;
        }
        public function getQuantity() {
            return $this->quantity;
        }
        public function getProductPrice() {
            return $this->product_price;
        }

        //Setter
        public function setUser(UserModel $user) {
            $this->user = $user;
        }
        public function setToltalPrice($total_price) {
            $this->total_price = $total_price;
        }
        public function setOrderStatus($order_status) {
            $this->order_status = $order_status;
        }
        public function setOrderDate($order_date) {
            $this->order_date = $order_date;
        }
        public function setReceiver($receiver) {
            $this->receiver = $receiver;
        }
        public function setAddress($address) {
            $this->address = $address;
        }
        public function setPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }
        public function setProductName($product_name) {
            $this->product_name = $product_name;
        }
        public function setQuantity($quantity) {
            $this->quantity = $quantity;
        }
        public function setProductPrice($product_price) {
            $this->product_price = $product_price;
        }
    }
?>