<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$token = $_POST["fcm_token"];

$controller = new FCMController();
$controller->addFcmToken($token);