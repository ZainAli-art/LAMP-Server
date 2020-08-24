<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

$controller = new UserController();
$uid = $_POST["uid"];
$email = $_POST["email"];
$fullname = $_POST["fullname"];
$imgdir = $_POST["img_dir"] ?? null;

$result = $controller->addNewUser($uid, $email, $fullname, $imgdir);

if ($result) {
    echo '{"response": "success"}';
} else {
    echo '{"response": "failure"}';
}