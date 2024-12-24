<?php
    class AdminController extends Controller {
        function index() {
            $this->view("admin/dashboard");
        }
    }
?>