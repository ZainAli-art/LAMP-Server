<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class ChatController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Chat();
        $this->view = new ViewUtils();
    }

    public function insert($fromId, $toId, $msg) {
        return $this->model->insert($fromId, $toId, $msg);
    }

    public function printChatJson($fromId, $toId) {
        $this->view->printRawJson($this->model->fetchChat($fromId, $toId));
    }
}