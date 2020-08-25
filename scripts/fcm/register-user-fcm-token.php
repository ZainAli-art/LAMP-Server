<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$uid = $_POST["uid"];
$token = $_POST["token"];

$controller = new FCMController();
$controller->registerUserWithFcmToken($token, $uid);