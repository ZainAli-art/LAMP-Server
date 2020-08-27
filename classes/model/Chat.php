<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Chat extends DbEcommerceConn {
    public function insert($senderToken, $receiverToken, $pid, $msg) {
        $sql = "INSERT INTO chats(sender_token, receiver_token, pid, msg) VALUE (?, ?, ?, ?)";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) {
            $stmt->execute([$senderToken, $receiverToken, $pid, $msg]);
            return true;
        }
    }

    public function fetchChat($senderToken, $receiverToken, $pid) : array {
        $sql = "SELECT * FROM chats 
                WHERE 
                    ((sender_token = '$senderToken' AND receiver_token = '$receiverToken') OR
                    (sender_token = '$receiverToken' AND receiver_token = '$senderToken'))
                    AND pid = $pid
                ORDER BY upload_time";

        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }
}