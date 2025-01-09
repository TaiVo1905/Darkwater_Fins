<?php
    class Controller {
        protected function view($view, $data = []) {
            if(file_exists("./app/views/" . $view . "View.php")) {
                require_once("./app/views/" . $view . "View.php");
            } else {
                die($view . "View.php does not exist.");
            }
        }

        protected function service($service) {
            if(file_exists("./app/services/" . $service . "Service.php")) {
                require_once("./app/services/" . $service . "Service.php");
            } else {
                die($service . "Service.php does not exist.");
            }
        }
    }
?>