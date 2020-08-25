<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$fromId = $_POST["from_id"];
$toId = $_POST["to_id"];

$controller = new ChatController();
$controller->printChatJson($fromId, $toId);