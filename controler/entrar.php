<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    if (!empty($emailForm) && !empty($senhaForm)) {
        $emailCorretoAdm = 'adm@email.com'; 
        $senhaCorretoAdm = password_hash('12345678',PASSWORD_BCRYPT);  
        $perfilAdm = 'Administrador';

        $emailCorretoUsuario = 'usuario@email.com'; 
        $senhaCorretoUsuario = password_hash('12345678',PASSWORD_BCRYPT);  
        $perfilUsuario = 'Usuario';

        $emailCorretoOng = 'ong@email.com';
        $senhaCorretoOng = password_hash('12345678',PASSWORD_BCRYPT);   
        $perfilOng = 'Ong';

        if ($emailForm === $emailCorretoAdm && password_verify($senhaForm, $senhaCorretoAdm)) {
            $_SESSION['email'] = $emailForm;
            $_SESSION['perfil'] = $perfilAdm;

            header ('Location: ../index.php');

        } elseif ($emailForm === $emailCorretoUsuario && password_verify($senhaForm, $senhaCorretoUsuario)) {
            $_SESSION['email'] = $emailForm;
            $_SESSION['perfil'] = $perfilUsuario;

            header ('Location: ../index.php');
        
        } elseif ($emailForm === $emailCorretoOng && password_verify($senhaForm, $senhaCorretoOng)) {
            $_SESSION['email'] = $emailForm;
            $_SESSION['perfil'] = $perfilOng;

            header ('Location: ../index.php');

        } else {
            header ('Location: ../view/pages/login.php');
        }
    }
}
?>