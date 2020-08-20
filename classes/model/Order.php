<?php
include_once "/opt/lampp/htdocs/packages.php";

class Order extends DbEcommerceConn {
    public function add($uid, $pid) {
        $sql = "INSERT INTO orders(uid, pid) VALUES($uid, $pid);";
        $this->connection()->query($sql);
    }

    public function fetchProductsByUid($uid) : array {
        $sql = "SELECT p.pid AS pid, pname, cat_id, img_dir, price, upload_time
                FROM orders o JOIN products p ON o.pid = p.pid and o.uid = ?";

        $stmt = $this->connection()->prepare($sql);
        $stmt->execute([$uid]);
        return $stmt->fetchAll();
    }
}