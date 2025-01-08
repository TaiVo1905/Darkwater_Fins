<?php
    require_once("./app/services/UserService.php");
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
            if(empty($_SESSION["user_id"])
                && (($this->controller == "UsersController" && $this->method == "index")
                    || $this->controller == "ShoppingCartController"
                    || $this->controller == "CheckoutController"
                    || ($this->controller == "AdminController"))) {
                    $this->controller = "UsersController";
                    $this->method = "_404";
            } else if (!empty($_SESSION["user_id"]) && $this->controller == "AdminController" && (
                (new UserService)->getUserById($_SESSION["user_id"] ?? -1) ? 
                    ((new UserService)->getUserById($_SESSION["user_id"]))->getRoles() == 0 : true)) {
                        $this->controller = "UsersController";
                        $this->method = "_404";
            }
            require_once("./app/controllers/" . $this->controller . ".php");
            $this->controller = new $this->controller;
        }

        public function dispatch() {
            if(method_exists($this->controller, $this->method)) {
                call_user_func_array([$this->controller, $this->method], $this->params);
            } else {
                require_once("./app/controllers/UsersController.php");
                call_user_func_array([new UsersController, "_404"], $this->params);
            }
        }
    }
?>