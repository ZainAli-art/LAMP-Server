<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new OrderController();
$uid = $_POST["uid"];

$controller->printOrderedProductsByUidJson($uid);