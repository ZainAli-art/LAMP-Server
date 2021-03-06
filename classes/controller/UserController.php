<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class UserController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new User();
        $this->view = new UserView();
    }

    public function printUserJson($user) {
        $this->view->printUserJson($user);
    }

    public function printUsersJson($users) {
        $this->view->printUsersJson($users);
    }

    public function addNewUser($uid, $email, $fullname, $imgdir) {
        return $this->model->insert($uid, $email, $fullname, $imgdir);
    }
}