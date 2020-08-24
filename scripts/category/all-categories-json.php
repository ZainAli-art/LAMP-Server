<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new CategoryController();
$controller->printAllCatJSON();