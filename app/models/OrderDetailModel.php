<?php
    #[AllowDynamicProperties]
    class OrderDetailModel {
        private $order_detail_id;
        private $order;
        private $product;
        private $quantity;
        private $price;

        public function __construct (OrderModel $order = null, ProductModel $product = null, $quantity = null, $price = null) {
            $this->order = $order;
            $this->product = $product;
            $this->quantity = $quantity;
            $this->price = $price;
        }

        //Getter
        public function getOrderDetailId() {
            return $this->order_detail_id;
        }
        public function getOrder() {
            return $this->order;
        }
        public function getProduct() {
            return $this->product;
        }
        public function getQuantity() {
            return $this->quantity;
        }

        //Setter
        public function setOrder(OrderModel $order) {
            $this->order = $order;
        }
        public function setProduct(ProductModel $product) {
            $this->product = $product;
        }
        public function setQuantity($quantity) {
            if ($this->product && $this->product->getProductStock() < $quantity) {
                throw new Exception("The required quantity exceeds the quantity in stock.");
            }
            $this->quantity = $quantity;
        }
    }
?>