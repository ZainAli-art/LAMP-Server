<?php 
include_once "/opt/lampp/htdocs/packages.php";

$controller = new ProductController();
$limit = $_GET["limit"];

$controller->showRecentProductsByLimit($limit);