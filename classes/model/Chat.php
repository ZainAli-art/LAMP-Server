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
        return false;
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

    public function fetchChatList($receiverToken) : array {
        $sql = "SELECT 
                    pid,
                    (CASE
                        WHEN sender_token = '$receiverToken' THEN receiver_token
                        ELSE sender_token
                    END) AS sender_token,
                    (CASE
                        WHEN sender_token != '$receiverToken' THEN receiver_token
                        ELSE sender_token
                    END) AS receiver_token,
                    msg,
                    fullname AS sender,
                    img_dir
                FROM chats c
                JOIN fcm f ON 
                    (f.token = sender_token AND receiver_token = '$receiverToken') OR
                    (f.token = receiver_token AND sender_token = '$receiverToken')
                JOIN users u ON f.uid = u.uid
                GROUP BY(pid)";

        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }
}