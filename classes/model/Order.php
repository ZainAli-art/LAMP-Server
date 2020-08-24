<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Order extends DbEcommerceConn {
    public function add($uid, $pid) {
        $sql = "INSERT INTO orders(uid, pid) VALUES($uid, $pid);";
        $this->connection()->query($sql);
    }

    public function fetchOrderedProductsByUid($uid) : array {
        $sql = "SELECT oid, pname AS product, img_dir
                FROM orders o JOIN products p ON o.pid = p.pid
                WHERE o.uid = ?";

        $stmt;
        if (($stmt = $this->connection()->prepare($sql)) && $stmt->execute([$uid])) {
            return $stmt->fetchAll();
        }
        return [];
    }

    public function fetchOrderDetailsByOid($oid) {
        $sql = "SELECT 
                    o.oid AS oid,
                    pname,
                    p.img_dir AS img_dir,
                    c.cat_name AS category,
                    order_time,
                    price
                FROM orders o
                JOIN products p ON p.pid = o.pid
                JOIN categories c ON c.cat_id = p.cat_id
                WHERE oid = ?;";

        $stmt;
        if (($stmt = $this->connection()->prepare($sql)) && $stmt->execute([$oid])) {
            return $stmt->fetch();
        }
        return null;
    }

    public function deleteByOid($oid) {
        $sql = "DELETE FROM orders WHERE oid = :oid";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(":oid", $oid);
            $stmt->execute();
        }
    }
}