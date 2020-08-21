<?php
include_once "/opt/lampp/htdocs/packages.php";

class OrderController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Order();
        $this->view = new ViewUtils();
    }

    public function addOrder($uid, $pid) {
        $this->model->add($uid, $pid);
    }

    public function printOrderedProductsByUidJson($uid) {
        $this->view->printRawJson($this->model->fetchOrderedProductsByUid($uid));
    }

    public function printOrderDetailsByOidJson($oid) {
        $this->view->printRawJson($this->model->fetchOrderDetailsByOid($oid));
    }

    public function deleteOrderByOid($oid) {
        $this->view->printRawJson($this->model->deleteByOid($oid));
    }
}