<?php
include_once "/opt/lampp/htdocs/packages.php";

class CustomerController {
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

    public function addNewUser($uid, $email, $fullname, $imgdir) : int {
        return $this->model->insert($uid, $email, $fullname, $imgdir);
    }
}