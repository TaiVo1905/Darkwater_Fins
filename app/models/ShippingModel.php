<?php
    #[AllowDynamicProperties]
    class ShippingModel {
        private $__shipping_id;
        private $__order;
        private $__phone_number;
        private $__address;
        private $__receiver;
        public function __construct (OrderModel $__order = null, $__phone_number = null, $__address = null, $__receiver = null) {
            $this->__order = $__order;
            $this->__phone_number = $__phone_number;
            $this->__address = $__address;
            $this->__receiver = $__receiver;
        }

        //Getter
        public function getShippingId() {
            return $this->__shipping_id;
        }
        public function getOrder() {
            return $this->__order;
        }
        public function getPhoneNumber() {
            return $this->__phone_number;
        }
        public function getAddress() {
            return $this->__address;
        }
        public function getReceiver() {
            return $this->__receiver;
        }

        //Setter
        public function setOrder(OrderModel $__order) {
            $this->__order = $__order;
        }
        public function setPhoneNumber($__phone_number) {
            $this->__phone_number = $__phone_number;
        }
        public function setAddress($__address) {
            $this->__address = $__address;
        }
        public function setReceiver($__receiver) {
            $this->__receiver = $__receiver;
        }
    }
?>