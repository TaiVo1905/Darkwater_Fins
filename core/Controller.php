<?php
    class Controller {
        protected function view($view, $data = []) {
            if(file_exists("./app/views/" . $view . "View.php")) {
                require_once("./app/views/" . $view . "View.php");
            } else {
                die($view . "View.php does not exist.");
            }
        }

        protected function model($model) {
            if(file_exists("./app/models/" . $view . "Model.php")) {
                require_once("./app/models/" . $view . "Model.php");
            } else {
                die($model . "Model.php does not exist.");
            }
        }
    }
?>