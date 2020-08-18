<?php
include_once "/opt/lampp/htdocs/packages.php";

class ProductController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Product();
        $this->view = new ProductView();
    }

    public function showAllProductsJSON() {
        $this->view->showProductsJSON($this->fetchAllProducts());
    }

    public function showProductsByCatIdJSON($catId) {
        $this->view->showProductsJSON($this->fetchProductsByCatId($catId));
    }

    public function fetchAllProducts() : array {
        return $this->model->fetchAllProducts();
    }

    public function fetchProductsByCatId($catId) : array{
        return $this->model->fetchProductsByCatId($catId);
    }

    public function insertProduct($pname, $imgDir, $catId, $price, $timestamp) {
        $this->model->insertProduct($pname, $imgDir, $catId, $price, $timestamp);
    }
}