<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once("./config/config.php");
    require_once("./core/Router.php");
    require_once("./core/Controller.php");
    require_once("./core/Model.php");
    require_once("./app/models/CartModel.php");
    require_once("./app/models/OrderModel.php");
    require_once("./app/models/OrderViewModel.php");
    require_once("./app/models/UserModel.php");
    require_once("./app/models/OrderDetailModel.php");
    require_once("./app/models/ProductModel.php");
    require_once("./app/models/ShippingModel.php");

    new Router();
?>