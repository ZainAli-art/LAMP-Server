<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$uid = $_POST["uid"];
$image = $_POST["image"];
$pname = $_POST["pname"];
$catId = $_POST["cat_id"];
$timestamp = time();
$imgDir = "assets/IMG$timestamp.jpg";
$price = $_POST["price"];

$imgUploadLocation = "../../assets/IMG$timestamp.jpg";

$controller = new ProductController();
$controller->insertProduct($uid, $pname, $imgDir, $catId, $price, $timestamp);
file_put_contents($imgUploadLocation, base64_decode($image));

// send notification that a new product has been uploaded
$notification = array(
    "title" => "Recent Products",
    "body" => $pname,
    "image" => $imgDir
);

$fcmController = new FCMController();
$fcmController->notifyAllUsers($notification);