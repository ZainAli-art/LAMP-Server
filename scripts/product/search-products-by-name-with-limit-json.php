<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new ProductController();
$pname = $_GET["pname"];
$limit = $_GET["limit"];

$products = $controller->searchAndShowProductsByNameWithLimitJSON($pname, $limit);