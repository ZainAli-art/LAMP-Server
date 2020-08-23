<?php
include_once "/opt/lampp/htdocs/packages.php";

class FCMController {
    private $model;

    public function __construct() {
        $this->model = new FCM();
    }

    public function notifyAllUsers($notification) {
        $this->model->notifyAllUsers($notification);
    }

    public function addFcmToken($token) {
        $this->model->insert($token);
    }

    public function fetchAllTokens() : array {
        return $this->model->fetchAllTokens();
    }

    public function updateToken($oldToken, $newToken) {
        $this->model->updateToken($oldToken, $newToken);
    }
}