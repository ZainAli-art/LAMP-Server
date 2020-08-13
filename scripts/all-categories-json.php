<?php
include_once "/opt/lampp/htdocs/packages.php";

$controller = new CategoryController();
$controller->printAllCatJSON();