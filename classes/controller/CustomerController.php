<?php
include_once "/opt/lampp/htdocs/packages.php";

class CustomerController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Customer();
        $this->view = new CustomerView();
    }

    public function printJSONUid($uid) {
        $this->view->printJSONUid($uid);
    }

    public function fetchUidByEmailPwd($email, $pwd) {
        return $this->model->fetchUidByEmailPwd($email, $pwd);
    }

    public function insertCustomer($email, $pwd) : int {
        $result = $this->fetchUidByEmailPwd($email, $pwd);
        if (!$result) {
            $this->model->insert($email, $pwd);
            return $this->fetchUidByEmailPwd($email, $pwd)["uid"];
        }
        return -1;
    }
}