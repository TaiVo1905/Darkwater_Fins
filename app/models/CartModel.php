<?php
    #[AllowDynamicProperties]
    class CartModel {
        private $cart_id;
        private $user;
        private $product;
        private $quantity;

        public function __construct (UserModel $user = null, ProductModel $product = null, $quantity = null) {
            $this->user = $user;
            $this->product = $product;
            $this->quantity = $quantity;
        }

        //Getter
        public function getCartId() {
            return $this->cart_id;
        }
        public function getUser() {
            return $this->user;
        }
        public function getProduct() {
            return $this->product;
        }
        public function getQuantity() {
            return $this->quantity;
        }

        //Setter
        public function setUser(UserModel $user) {
            $this->user = $user;
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