<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$token = $_POST["token"];

$controller = new FCMController();
$controller->unregisterToken($token);