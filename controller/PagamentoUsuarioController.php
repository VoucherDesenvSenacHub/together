<?php
session_start();
require_once __DIR__ . "/../model/validators/pagamentoValidator.php";


try {
    $logadont = !isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['perfil']) || empty($_SESSION['perfil']);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $validator = new pagamentoValidator();
        $validator->validar($_POST);
        
        if($logadont) {
            throw new Exception("Usuário não autenticado. Faça login para continuar.");
        }

        header("Location: ../index.php");
        exit();
    } else {
        throw new Exception("Método inválido para esta requisição.");
    }

} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    if ($logadont){
        header('Location: ../view/pages/login.php');
    } else {
        header('Location: ../view/pages/Usuario/pagamento_Usuario.php');
    }
    exit();
}
