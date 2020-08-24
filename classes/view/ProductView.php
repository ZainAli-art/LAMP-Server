<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class ProductView {
    function showProductsJSON($products) {
        echo json_encode($products, JSON_UNESCAPED_SLASHES);
    }
}