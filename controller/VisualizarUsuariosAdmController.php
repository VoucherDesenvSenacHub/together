<?php
require "../../../model/VisualizarUsuarioModel.php";
require "../../../model/VisualizarOngModel.php";

try {
    // Verifica se a requisição é GET
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Método inválido para esta requisição");
    }

    // ===== Configuração da paginação =====
    $porPagina = 15;
    $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    $pagina = max(1, $pagina); // nunca menor que 1
    $offset = ($pagina - 1) * $porPagina;

    // ===== Model Usuário =====
    $VisualizarUsuarioModel = new VisualizarUsuarioModel();
    $totalUsuarios = $VisualizarUsuarioModel->contarUsuarios();
    $VisualizarUsuarios = $VisualizarUsuarioModel->listarUsuariosPaginado($porPagina, $offset);
    $quantidadeDePaginasUsuarios = ceil($totalUsuarios / $porPagina);

    // ===== Model Ong =====
    $VisualizarOngModel = new VisualizarOngModel();
    $totalOngs = $VisualizarOngModel->contarOngs();
    $VisualizarOngs = $VisualizarOngModel->listarOngsPaginado($porPagina, $offset);
    $quantidadeDePaginasOngs = ceil($totalOngs / $porPagina);

    // ===== Define qual tabela tem mais páginas =====
    $quantidadeDePaginas = max($quantidadeDePaginasUsuarios, $quantidadeDePaginasOngs);

    if (
        (!$VisualizarUsuarios || count($VisualizarUsuarios) === 0)
        && (!$VisualizarOngs || count($VisualizarOngs) === 0)
    ) {
        throw new Exception("Nenhum dado encontrado.");
    }

} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
}
