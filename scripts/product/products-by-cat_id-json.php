<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new ProductController();
$catId = $_GET["cat_id"];
$controller->showProductsByCatIdJSON($catId);