<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

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

    public function registerUserWithFcmToken($token, $uid) {
        $this->model->insert($token, $uid);
    }

    public function fetchAllTokens() : array {
        return $this->model->fetchAllTokens();
    }

    public function updateToken($oldToken, $newToken) {
        $this->model->updateToken($oldToken, $newToken);
    }

    public function unregisterToken($token) {
        $this->model->deleteByToken($token);
    }
}