<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Product extends DbEcommerceConn {
    public function fetchAllProducts() : array {
        $sql    = "SELECT * FROM products";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function fetchProductDetailsByPid($pid) {
        $sql = "SELECT 
                    pid,
                    u.uid as seller_id,
                    p.pname AS product, 
                    cat_name AS category, 
                    p.img_dir AS img_dir, 
                    upload_time,
                    price,
                    fullname as seller,
                    email as contact
                FROM users u 
                JOIN products p ON u.uid = p.uid
                JOIN categories c ON p.cat_id = c.cat_id 
                WHERE pid = ?";
        $stmt;
        if (($stmt = $this->connection()->prepare($sql)) && $stmt->execute([$pid])) {
            return $stmt->fetch();
        }
        return null;
    }

    public function fetchProductsByCatId($catId) : array {
        $sql  = "SELECT * FROM products WHERE cat_id = ?";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt && $stmt->execute([$catId])) {
            return $stmt->fetchAll();
        }
        return [];
    }

    public function fetchRecentProductsOfLimit($limit) : array {
        $sql = "SELECT * FROM products ORDER BY upload_time DESC LIMIT $limit";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function searchProductsByNameWithLimit($pname, $limit) : array {
        $sql = "SELECT * FROM products WHERE pname LIKE '%$pname%' LIMIT $limit";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function insertProduct($uid, $pname, $imgDir, $catId, $price, $timestamp) {
        $sql  = "INSERT INTO products(uid, pname, img_dir, cat_id, price, upload_time) 
                VALUES (?, ?, ?, ?, ?, FROM_UNIXTIME(?));";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$uid, $pname, $imgDir, $catId, $price, $timestamp]);
        return false;
    }
}