<?php 

require_once(dirname(__FILE__) ."../model/DoacaoModel.php");
$modelDoacao = new ModelDoacao();
session_start();

$idUsuario = $_SESSION["idUsuario"];

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if (!empty($idUsuario)) {
        $doacoes = $modelDoacao->getDoacoes($idUsuario);
    }
}

?>