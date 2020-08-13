<?php
include_once "/opt/lampp/htdocs/packages.php";

class CustomerView {
    public function printJSONUid($uid) {
        if ($uid == null) {
            echo '{"uid": ' . -1 . '}';
        } else {
            echo '{"uid": ' . $uid . '}';
        }
    }
}