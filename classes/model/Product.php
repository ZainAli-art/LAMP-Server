<?php
include_once "/opt/lampp/htdocs/packages.php";

class Product extends DBEcommerceConn {
    public function fetchAllProducts() : array {
        $sql    = "SELECT * FROM products";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function fetchProductsByCatId($catId) : array {
        $sql  = "SELECT * FROM products WHERE cat_id = ?";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt && $stmt->execute([$catId])) {
            return $stmt->fetchAll();
        }
        return [];
    }

    public function insertProduct($pname, $imgDir, $catId, $price, $timestamp) {
        $sql  = "INSERT INTO products(pname, img_dir, cat_id, price, upload_time) 
                VALUES (?, ?, ?, ?, FROM_UNIXTIME(?));";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$pname, $imgDir, $catId, $price, $timestamp]);
        return false;
    }
}