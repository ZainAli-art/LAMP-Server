<?php
$classesPath = "classes/";
$includesPath = "includes/";
$modelPath = $classesPath . "model/";
$viewPath = $classesPath . "view/";
$controllerPath = $classesPath . "controller/";

// includes paths
include_once $includesPath . "DbEcommerceConn.php";

// model paths
include_once $modelPath . "Category.php";
include_once $modelPath . "Product.php";
include_once $modelPath . "User.php";
include_once $modelPath . "Order.php";
include_once $modelPath . "FCM.php";
include_once $modelPath . "Chat.php";

// view paths
include_once $viewPath . "CategoryView.php";
include_once $viewPath . "ProductView.php";
include_once $viewPath . "UserView.php";
include_once $viewPath . "ViewUtils.php";

// controller paths
include_once $controllerPath . "CategoryController.php";
include_once $controllerPath . "ProductController.php";
include_once $controllerPath . "UserController.php";
include_once $controllerPath . "OrderController.php";
include_once $controllerPath . "FCMController.php";
include_once $controllerPath . "ChatController.php";