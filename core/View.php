<?php
    class View {
        public static function render($view, $data = []) {
            if (file_exists("./app/views/" . $view . ".php")) {
                require_once "./app/views/" . $view . ".php";
            } else {
                die($view . "View.php does not exist.");
            }
        }
    }
?>