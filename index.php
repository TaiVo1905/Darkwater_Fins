<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once("./config/config.php");
    require_once("./core/Router.php");
    require_once("./core/Controller.php");
    require_once("./core/Model.php");

    new Router();
?>