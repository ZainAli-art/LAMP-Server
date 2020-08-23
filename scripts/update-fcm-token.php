<?php
include_once "/opt/lampp/htdocs/packages.php";

$oldToken = $_POST["old_token"];
$newToken = $_POST["new_token"];

$controller = new FCMController();
$controller->updateToken($oldToken, $newToken);