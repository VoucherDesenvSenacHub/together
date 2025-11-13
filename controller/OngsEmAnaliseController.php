<?php
session_start();
require_once __DIR__ . "/../model/ValidarCadastroOngModel.php";

$validarCadastroOngModel = new ValidarCadastroOngModel();



try {
    // Verifica se a requisão é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método inválido para esta requisição");
    }
    $idOng = $_POST["id"];
    $tipo = $_POST["tipo_alteracao"];
    $tipoUsuario = $validarCadastroOngModel->ValidarPerfilUsuario($idOng);
    if ($tipoUsuario['tipo_perfil'] == "Administrador" && $tipo == 'aprovado') {
        $_SESSION["message"] = 'Não é possível transformar um usuário administrador em ong';
        $_SESSION["type"] = 'erro';
        header("Location: /together/view/pages/adm/OngsAValidar.php");
        exit();
    }

    if (isset($_POST["id"]) && isset($_POST['tipo_alteracao'])) {
        $validarCadastroOngModel->AtualizarStatusValidacao($idOng, $tipo);
        $validarCadastroOngModel->AtualizarTipoDeUsuario($tipo, $idOng);
        if ($tipo == "aprovado") {
            $_SESSION["message"] = 'Ong validada com sucesso!';
        } else {
            $_SESSION["message"] = 'Ong rejeitada!';
        }
        $_SESSION["type"] = 'sucesso';
        header("Location: /together/view/pages/adm/OngsAValidar.php");
        exit();
    }
} catch (Exception $e) {
    $_SESSION[""] = 'erro';
    $_SESSION["message"] = 'Algo deu errado!';
    header('Location: /together/view/pages/adm/OngsAValidar.php');
}
