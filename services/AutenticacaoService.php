<?php

class AutenticacaoService
{
    
    public static function validarAcessoLogado($tiposPermitidos = [])
    {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        
        if (!isset($_SESSION['id']) || !isset($_SESSION['perfil'])) {
            header("Location: /together/view/pages/login.php");
            exit;
        }

        $tipoPerfil = $_SESSION['perfil'];

        
        if (!empty($tiposPermitidos) && !in_array($tipoPerfil, $tiposPermitidos)) {
            header("Location: /together/index.php");
            exit;
        }
    }

    public static function validarAcessoSemLogin()
    {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

       
        if (!empty($_SESSION['id']) && !empty($_SESSION['perfil'])) {
            header("Location: /together/index.php");
            exit;
        }
    }
}
