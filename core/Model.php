<?php
    require_once("./config/config.php");
    class Model {
        protected $db;

        public function __construct () {
            try {
                $this -> db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . '"', DB_USER, DB_PASS);
            } catch(PDOException $e) {
                die($e -> getMessage());
            }

        }
    }
?>