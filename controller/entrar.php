<?php
session_start();
require_once "./../model/LoginModel.php";

$_SERVER['perfil'] = "Visitante";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $emailForm = $_POST['emailForm'];
    $senhaForm = $_POST['senhaForm'];
    if (!empty($emailForm) && !empty($senhaForm)) {
        echo "Entrou no primeiro if";

        $loginModel = new LoginModel();
        $usuarioLogin = $loginModel->LoginModelUsuario($emailForm, $senhaForm);

        if ($usuarioLogin) {
            $_SESSION['email'] = $usuarioLogin['email'];
            $_SESSION['perfil'] = $usuarioLogin['perfil'];
            header('Location: ../index.php');
            exit();
        } else {
            header('Location: ../view/pages/login.php');
            exit();
        }

        // $erro = "Email ou senha incorretos";



        // $usuarios = [

        //     [
        //         'email' => 'adm@email.com',
        //         'senha' => password_hash('12345678',PASSWORD_BCRYPT),
        //         'perfil' => 'Administrador',
        //     ],
        //     [
        //         'email' => 'ong@email.com',
        //         'senha' => password_hash('12345678',PASSWORD_BCRYPT),
        //         'perfil' => 'Ong',
        //     ],
        //     [
        //         'email' => 'usuario@email.com',
        //         'senha' => password_hash('12345678',PASSWORD_BCRYPT),
        //         'perfil' => 'Usuario',
        //     ],
        // ];
        // foreach ($usuarios as $usuario) {
        //     if ($emailForm === $usuario['email'] && password_verify($senhaForm, $usuario['senha'])) {
        //         $_SESSION['email'] = $usuario['email'];
        //         $_SESSION['perfil'] = $usuario['perfil'];

        //         return header('Location: ../index.php');
        //     } else {
        //         header('Location: ../view/pages/login.php');
        //     }
        // }
    } else {
        echo "Não entrou no primeiro if";
    }
}

?>