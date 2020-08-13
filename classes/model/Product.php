<?php
include_once "/opt/lampp/htdocs/packages.php";

class Product extends DBEcommerceConn {
    public function fetchAllProducts() : array {
        $sql = "SELECT * FROM products";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function fetchProductsByCatId($catId) : array {
        $sql = "SELECT * FROM products WHERE cat_id = ?";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute([$catId]);
        return $stmt->fetchAll();
    }

    public function insertProduct($pname, $imgDir, $catId) {
        $sql = "INSERT INTO products(pname, img_dir, cat_id) VALUES (?, ?, ?)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute([$pname, $imgDir, $catId]);
    }
}