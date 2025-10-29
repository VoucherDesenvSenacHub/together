<?php 

require_once(dirname(__FILE__) ."/../model/DoacaoModel.php");
$modelDoacao = new DoacaoModel();
session_start();

// $idUsuario = $_SESSION["idUsuario"];
$idUsuario = 1;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if (!empty($idUsuario)) {
        $doacoes = $modelDoacao->BuscarDoacoesPorID($idUsuario);
    }
}

?>