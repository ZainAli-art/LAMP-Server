<?php
include_once "/opt/lampp/htdocs/packages.php";

$controller = new CustomerController();
$email = $_POST["email"];
$pwd = $_POST["pwd"];

$uid = $controller->insertCustomer($email, $pwd);

$controller->printJSONUid($uid);