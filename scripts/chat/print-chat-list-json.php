<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$receiverToken = $_POST["receiver_token"];

$controller = new ChatController();
$controller->printChatListJson($receiverToken);