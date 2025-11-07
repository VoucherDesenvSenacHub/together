<?php

class AutenticacaoService
{
    // Valida se o usuário está logado e possui um perfil permitido
    public static function validarAcessoLogado($tiposPermitidos = [])
    {
        // Garante que a sessão está ativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se há usuário logado
        if (!isset($_SESSION['id']) || !isset($_SESSION['perfil'])) {
            header("Location: /together/view/pages/login.php");
            exit;
        }

        $tipoPerfil = $_SESSION['perfil'];

        // Verifica se o tipo de perfil é permitido para esta página
        if (!empty($tiposPermitidos) && !in_array($tipoPerfil, $tiposPermitidos)) {
            header("Location: /together/index.php");
            exit;
        }
    }

    public static function validarAcessoSemLogin()
    {
        // Garante que a sessão está ativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se estiver logado, redireciona para a página inicial
        if (!empty($_SESSION['id']) && !empty($_SESSION['perfil'])) {
            header("Location: /together/index.php");
            exit;
        }
    }
}
