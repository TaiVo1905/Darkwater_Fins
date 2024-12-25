<?php
    class AdminController extends Controller {
        public function orderManagement() {
            $this->view("admin/orderManagement");
        }
        public function userManagement() {
            $this->view("admin/userManagement");
        }
        public function productManagement() {
            $this->view("admin/productManagement");
        }
    }
?>