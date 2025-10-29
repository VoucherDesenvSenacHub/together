<?php

require_once '../config/database.php';

class PdfUtil
{
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->$conn = $database->conectar();
    }
}