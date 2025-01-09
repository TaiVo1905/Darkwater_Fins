<?php
    #[AllowDynamicProperties]
    class OrderViewModel {
        private $order_id;
        private $user_id;
        private $total_price;
        private $order_status;
        private $order_date;
        private $receiver;
        private $address;
        private $phone_number;
        private $product_img_url;
        private $product_name;
        private $product_category;
        private $quantity;
        private $product_price;

        public function __construct ($order_id = null,
                                    $user_id = null,
                                    $total_price = null,
                                    $order_status = null,
                                    $order_date = null,
                                    $receiver = null,
                                    $address = null,
                                    $phone_number = null,
                                    $product_img_url = null,
                                    $product_name = null,
                                    $product_category = null,
                                    $quantity = null,
                                    $product_price = null) {
            $this->order_id = $order_id;
            $this->user_id = $user_id;
            $this->total_price = $total_price;
            $this->order_status = $order_status;
            $this->order_date = $order_date;
            $this->receiver = $receiver;
            $this->address = $address;
            $this->phone_number = $phone_number;
            $this->product_img_url = $product_img_url;
            $this->product_name = $product_name;
            $this->product_category = $product_category;
            $this->quantity = $quantity;
            $this->product_price = $product_price;
        }

        //Getter
        public function getOrderId() {
            return $this->order_id;
        }
        public function getUserId() {
            return $this->user_id;
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
        public function getReceiver() {
            return $this->receiver;
        }
        public function getAddress() {
            return $this->address;
        }
        public function getPhoneNumber() {
            return $this->phone_number;
        }
        public function getProductImgUrl() {
            return $this->product_img_url;
        }
        public function getProductName() {
            return $this->product_name;
        }
        public function getProductCategory() {
            return $this->product_category;
        }
        public function getQuantity() {
            return $this->quantity;
        }
        public function getProductPrice() {
            return $this->product_price;
        }

        //Setter
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
        public function setReceiver($receiver) {
            $this->receiver = $receiver;
        }
        public function setAddress($address) {
            $this->address = $address;
        }
        public function setPhoneNumber($phone_number) {
            if (!preg_match('/^\d{10,11}$/', $phone_number)) {
                throw new Exception("Invalid phone number format.");
            }
            
            $this->phone_number = $phone_number;
        }        
        public function setProductUImgUrl($product_img_url) {
            $this->product_img_url = $product_img_url;
        }
        public function setProductName($product_name) {
            $this->product_name = $product_name;
        }
        public function setProductCategory($product_category) {
            $this->product_category = $product_category;
        }
        public function setQuantity($quantity) {
            if ($this->product && $this->product->getProductStock() < $quantity) {
                throw new Exception("The required quantity exceeds the quantity in stock.");
            }
            $this->quantity = $quantity;
        }
        public function setProductPrice($product_price) {
            if ($product_price <= 0) {
                throw new Exception("Product price must be greater than zero.");
            }
            $this->product_price = $product_price;
        }
        public function returnDataJson() {
            return (object) array(
                'order_id' => $this->order_id,
                'user_id' => $this->user_id,
                'total_price' => $this->total_price,
                'order_status' => $this->order_status,
                'order_date' => $this->order_date,
                'receiver' => $this->receiver,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
                'product_img_url' => $this->product_img_url,
                'product_name' => $this->product_name,
                'product_category' => $this->product_category,
                'quantity' => $this->quantity,
                'product_price' => $this->product_price
            );
        }
    }
?>