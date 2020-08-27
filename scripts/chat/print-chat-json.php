<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$senderToken = $_POST["sender_token"];
$receiverToken = $_POST["receiver_token"];
$pid = $_POST["pid"];

$controller = new ChatController();
$controller->printChatJson($senderToken, $receiverToken, $pid);