<?php
include_once "/opt/lampp/htdocs/packages.php";

$controller = new OrderController();

$uid = $_POST["uid"];
$pid = $_POST["pid"];

$controller->addOrder($uid, $pid);