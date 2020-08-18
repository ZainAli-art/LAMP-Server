<?php 
include_once "/opt/lampp/htdocs/packages.php";

$image = $_POST["image"];
$pname = $_POST["pname"];
$catId = $_POST["cat_id"];
$timestamp = time();
$imgDir = "../assets/IMG$timestamp.jpg";

$controller = new ProductController();
$controller->insertProduct($pname, $imgDir, $catId, $timestamp);
file_put_contents($imgDir, base64_decode($image));

echo "upload successful";