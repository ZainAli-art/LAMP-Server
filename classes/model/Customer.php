<?php
include_once "/opt/lampp/htdocs/packages.php";

class Customer extends DBEcommerceConn {
    public function fetchUidByEmailPwd($email, $pwd) {
        $sql  = "SELECT uid FROM customers WHERE email = ? AND pwd = ?";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt && $stmt->execute([$email, $pwd])) {
            return $stmt->fetch();
        }
        return [];
    }

    public function insert($email, $pwd) {
        $sql  = "INSERT IGNORE INTO customers(email, pwd) VALUES (?, ?)";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$email, $pwd]);
        return false;
    }
}