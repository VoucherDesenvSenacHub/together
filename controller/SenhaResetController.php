<?php
require_once "../../../model/AdmModel.php";

try {
    $erros = [];
    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        $erros[] = "Metodo de requisição invalido!";
        header("Location: together/index.php");
        exit;
    }

} catch (Exception $e) {

}


?>