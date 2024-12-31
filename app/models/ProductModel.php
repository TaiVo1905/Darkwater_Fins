<?php
    #[AllowDynamicProperties]
    class ProductModel {
        private $product_id;
        private $product_name;
        private $product_img_url;
        private $product_price;
        private $product_sub;
        private $product_description;
        private $product_stock;
        private $product_category;
        private $product_type;
        private $purchases;
        private $deleted;

        public function __construct ($product_name = null, $product_img_url = null, $product_price = null, $product_sub = null,
                                    $product_description = null, $product_stock = null, $product_category = null, $product_type = null) {
            $this->product_name = $product_name;
            $this->product_img_url = $product_img_url;
            $this->product_price = $product_price;
            $this->product_sub = $product_sub;
            $this->product_description = $product_description;
            $this->product_stock = $product_stock;
            $this->product_category = $product_category;
            $this->product_type = $product_type;
        }

        //Getter
        public function getProductId() {
            return $this->product_id;
        }
        public function getProductName() {
            return $this->product_name;
        }
        public function getProductImgUrl() {
            return $this->product_img_url;
        }
        public function getProductPrice() {
            return $this->product_price;
        }
        public function getProductSub() {
            return $this->product_sub;
        }
        public function getProductDescription() {
            return $this->product_description;
        }
        public function getProductStock() {
            return $this->product_stock;
        }
        public function getProductCategory() {
            return $this->product_category;
        }
        public function getProductType() {
            return $this->product_type;
        }
        public function getPurchases() {
            return $this->purchases;
        }
        public function getDeleted() {
            return $this->deleted;
        }

        //Setter
        public function setProductName($product_name) {
            $this->product_name = $product_name;
        }
        public function setProductImgUrl($product_img_url) {
            $this->product_img_url = $product_img_url;
        }
        public function setProductPrice($product_price) {
            $this->product_price = $product_price;
        }
        public function setProductSub($product_sub) {
            $this->product_sub = $product_sub;
        }
        public function setProductDescription($product_description) {
            $this->product_description = $product_description;
        }
        public function setProductStock($product_stock) {
            $this->product_stock = $product_stock;
        }
        public function setProductCategory($product_category) {
            $this->product_category = $product_category;
        }
        public function setProductType($product_type) {
            $this->product_type = $product_type;
        }
        public function setPurchases() {
            $this->purchases = $purchases;
        }
        public function setDeleted() {
            $this->deleted = $deleted;
        }
    }
?>