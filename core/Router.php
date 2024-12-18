<?php
    class Router {
        protected $controller = "HomeController";
        protected $method = "index";
        protected $params = [];

        public function __construct () {
            $this->getUrl();
            $this->dispatch();
        }

        public function getUrl() {
            if(isset($_GET["url"])) {
                $url = rtrim($_GET["url"], "/");
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/", $url);
                if(file_exists("./app/controllers/" . ucfirst($url[0]) . "Controller.php")) {
                    $this->controller = ucfirst($url[0]) . "Controller";
                    unset($url[0]);
                }
                if(isset($url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
                $this->params = $url ? array_values($url) : [];
            }
            require_once("./app/controllers/" . $this->controller . ".php");
            $this->controller = new $this->controller;
        }

        public function dispatch() {
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
    }
?>