<?php
require_once "../../../model/CategoriaOngModel.php";

class CategoriaOngController {
    private $model;

    public function __construct($db) {
        $this->model = new CategoriaOngModel($db);
    }

    public function listar() {
        return $this->model->getAll();
    }
}
