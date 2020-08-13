<?php
include_once "/opt/lampp/htdocs/packages.php";

class CategoryView {
    public function printCatJSON($categories) {
        echo json_encode($categories, JSON_UNESCAPED_SLASHES);
    }
}