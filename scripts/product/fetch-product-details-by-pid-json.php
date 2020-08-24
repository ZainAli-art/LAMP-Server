<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new ProductController();
$pid = $_GET["pid"];
$controller->showProductDetailsByPidJSON($pid);