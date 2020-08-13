<?php
include_once "/opt/lampp/htdocs/packages.php";

class CategoryController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Category();
        $this->view = new CategoryView();
    }

    public function printAllCatJSON() {
        $this->view->printCatJSON($this->fetchAllCat());
    }

    public function printCatJSONById($catId) {
        $this->view->printCatJSON($this->fetchCatById($catId));
    }

    public function fetchAllCat() {
        return $this->model->fetchAll();
    }

    public function fetchCatById($catId) {
        $this->model->fetchById($catId);
    }

    public function insertCat($catname, $imgdir) {
        $this->model->insertCat($catname, $imgdir);
    }
}