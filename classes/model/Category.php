<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class Category extends DbEcommerceConn {
    public function fetchAll() : array {
        $sql    = "SELECT * FROM categories";
        $result = $this->connection()->query($sql);
        return $result->fetchAll();
    }

    public function fetchById($catId) {
        $sql  = "SELECT * FROM categories WHERE cat_id = ?;";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt && $stmt->execute([$catId])) {
            return $stmt->fetchAll();
        }
        return [];
    }

    public function insertCat($catname, $imgdir) {
        $sql  = "INSERT INTO categories(cat_name, img_dir) VALUES (?, ?);";
        $stmt = $this->connection()->prepare($sql);
        if ($stmt) return $stmt->execute([$catname, $imgdir]);
        return false;
    }
}