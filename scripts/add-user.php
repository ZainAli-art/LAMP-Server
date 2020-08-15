<?php
include_once "/opt/lampp/htdocs/packages.php";

$controller = new UserController();
$uid = $_POST["uid"];
$email = $_POST["email"];
$fullname = $_POST["fullname"];
$imgdir = $_POST["img_dir"];

$result = $controller->insert($uid, $email, $fullname, $imgdir);

if ($result) {
    echo "success";
} else {
    echo "failure";
}