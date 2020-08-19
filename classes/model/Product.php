<?php
include_once "/opt/lampp/htdocs/packages.php";

class Product extends DBEcommerceConn {
    public function fetchAllProducts() : array {
        $sql    = "SELECT * FROM products";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function fetchProductDetailsByPid($pid) {
        $sql = "SELECT 
                    pid,
                    p.pname AS product, 
                    cat_name AS category, 
                    p.img_dir AS img_dir, 
                    upload_time,
                    price
                FROM products p 
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

    public function insertProduct($pname, $imgDir, $catId, $price, $timestamp) {
        $sql  = "INSERT INTO products(pname, img_dir, cat_id, price, upload_time) 
                VALUES (?, ?, ?, ?, FROM_UNIXTIME(?));";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$pname, $imgDir, $catId, $price, $timestamp]);
        return false;
    }
}