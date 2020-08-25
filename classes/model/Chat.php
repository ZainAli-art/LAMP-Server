<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Chat extends DbEcommerceConn {
    public function insert($fromId, $toId, $msg) {
        $sql = "INSERT INTO chats(from_id, to_id, msg) VALUE (?, ?, ?)";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) {
            $stmt->execute([$fromId, $toId, $msg]);
            return true;
        }
    }

    public function fetchChat($fromId, $toId) : array {
        $sql = "SELECT * FROM chats 
                WHERE to_id = '$toId' AND from_id = '$fromId'
                ORDER BY upload_time DESC";

        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }
}