<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] === "aplicar") {
            // Salva os checkboxes selecionados na sessão
            $filtro = [
                'ids' => $_POST['idCategoria'] ?? [], // array de ids
                'nomes' => $_POST['nomeCategoria'] ?? [], // array de nomes
                'sucesso' => true,
            ];
            $_SESSION['buscaDeOng'] = $filtro;
        } elseif ($_POST['acao'] === 'limpar') {
            // Limpa os filtros
            unset($_SESSION['buscaDeOng']);
        }
    }
    header('Location: /together/view/pages/pesquisarOng.php');
    exit;
}
