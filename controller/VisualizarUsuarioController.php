<?php
require "../../../model/VisualizarUsuarioModel.php";

try {
    // Verifica se a requisição é GET
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Método inválido para esta requisição");
    }
    // Executa a consulta no Model
    $VisualizarUsuarioModel = new VisualizarUsuarioModel();
    $VisualizarUsuarios = $VisualizarUsuarioModel->DataNomeUsuario();

    // aqui deve conter os dois model, tanto do usuario quanto o da ong.

    if (!$VisualizarUsuarios) {
        throw new Exception("Nenhum dado encontrado.");
    }
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
}

