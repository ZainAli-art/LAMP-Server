<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$senderToken = $_POST["sender_token"];
$receiverToken = $_POST["receiver_token"];
$msg = $_POST["msg"];
$pid = $_POST["pid"];

$chatController = new ChatController();
$chatController->insertAndPrintChatsJson($senderToken, $receiverToken, $pid,   $msg);
    $fcmController = new FCMController();

    $sender = $fcmController->fetchUserNameByToken($senderToken)["fullname"];

    echo "sender: $sender \n";

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

    $fcmController->notifySingleUser($receiverToken, $notification, $data);