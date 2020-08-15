<?php
include_once "/opt/lampp/htdocs/packages.php";

class User extends DBEcommerceConn {   
    public function insert($uid, $email, $fullname, $imgdir) {
        $sql  = "INSERT IGNORE INTO users(uid, email, fullname, img_dir) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$uid, $email, $fullname]);
        return false;
    }
}