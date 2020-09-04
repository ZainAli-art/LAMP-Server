<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class ChatController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Chat();
        $this->view = new ViewUtils();
    }

    public function insert($senderToken, $receiverToken, $pid, $msg) {
        return $this->model->insert($senderToken, $receiverToken, $pid, $msg);
    }

    public function insertAndPrintChatsJson($senderToken, $receiverToken, $pid, $msg) {
        $this->insert($senderToken, $receiverToken, $pid, $msg);
        $this->printChatJson($senderToken, $receiverToken, $pid);
    }

    public function printChatJson($senderToken, $receiverToken, $pid) {
        $this->view->printRawJson($this->model->fetchChat($senderToken, $receiverToken, $pid));
    }

    public function printChatListJson($receiverToken) {
        $this->view->printRawJson($this->model->fetchChatList($receiverToken));
    }
}