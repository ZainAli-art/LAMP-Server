<?php
include_once "/opt/lampp/htdocs/ecommerce/packages.php";

class ProductController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Product();
        $this->view = new ProductView();
    }

    public function showAllProductsJSON() {
        $this->view->showProductsJSON($this->model->fetchAllProducts());
    }

    public function showProductDetailsByPidJSON($pid) {
        $this->view->showProductsJSON($this->model->fetchProductDetailsByPid($pid));
    }

    public function showProductsByCatIdJSON($catId) {
        $this->view->showProductsJSON($this->model->fetchProductsByCatId($catId));
    }

    public function searchAndShowProductsByNameWithLimitJSON($pname, $limit) {
        $this->view->showProductsJSON($this->model->searchProductsByNameWithLimit($pname, $limit));
    }

    public function showRecentProductsByLimit($limit) {
        $this->view->showProductsJSON($this->model->fetchRecentProductsOfLimit($limit));
    }

    public function insertProduct($pname, $imgDir, $catId, $price, $timestamp) {
        $this->model->insertProduct($pname, $imgDir, $catId, $price, $timestamp);
    }
}