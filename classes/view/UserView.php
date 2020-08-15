<?php
include_once "/opt/lampp/htdocs/packages.php";

class UserView {
    public function printUserJson($user) {
        echo json_encode($user, JSON_UNESCAPED_SLASHES);
    }

    public function printUsersJson($users) {
        echo json_encode($users, JSON_UNESCAPED_SLASHES);
    }
}