<?php
include_once "/opt/lampp/htdocs/packages.php";

$controller = new OrderController();
$oid = $_POST["oid"];
$controller->deleteOrderByOid($oid);