<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$fromId = $_POST["from_id"];
$toId = $_POST["to_id"];
$msg = $_POST["msg"];
$sender = $_POST["sender"];

$chatController = new ChatController();
if ($chatController->insert($fromId, $toId, $msg)) {
    $to = $_POST["to"]; // fcm_token
    $notification = array(
        "title" => $sender,
        "body" => $msg
    );
    $data = array(
        "from_id" => $fromId
    );

    $fcmController = new FCMController();
    $fcmController->notifySingleUser($to, $notification, $data);
}