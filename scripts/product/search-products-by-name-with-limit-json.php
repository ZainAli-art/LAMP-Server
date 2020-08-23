<?php 
include_once "/opt/lampp/htdocs/packages.php";

$controller = new ProductController();
$pname = $_GET["pname"];
$limit = $_GET["limit"];

$products = $controller->searchAndShowProductsByNameWithLimitJSON($pname, $limit);