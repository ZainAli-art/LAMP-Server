<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$senderToken = $_POST["sender_token"];
$receiverToken = $_POST["receiver_token"];
$msg = $_POST["msg"];
$pid = $_POST["pid"];

$chatController = new ChatController();
if ($chatController->insert($senderToken, $receiverToken, $pid, $msg)) {
    $sender = $_POST["sender_name"]; // sender name

    $notification = array(
        "title" => $sender,
        "body" => $msg,
        "tag" => "chat"
    );
    $data = array(
        "sender_token" => $senderToken,
        "receiver_token" => $receiverToken, 
        "pid" => $pid
    );

    $fcmController = new FCMController();
    $fcmController->notifySingleUser($receiverToken, $notification, $data);
}