<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new ProductController();
$limit = $_GET["limit"];

$controller->showRecentProductsByLimit($limit);