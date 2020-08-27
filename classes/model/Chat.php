<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Chat extends DbEcommerceConn {
    public function insert($senderToken, $receiverToken, $msg) {
        $sql = "INSERT INTO chats(sender_token, receiver_token, msg) VALUE (?, ?, ?)";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) {
            $stmt->execute([$senderToken, $receiverToken, $msg]);
            return true;
        }
    }

    public function fetchChat($senderToken, $receiverToken) : array {
        $sql = "SELECT * FROM chats 
                WHERE 
                    (sender_token = '$senderToken' AND receiver_token = '$receiverToken') OR
                    (sender_token = '$receiverToken' AND receiver_token = '$senderToken')
                ORDER BY upload_time";

        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }
}