<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $emailForm = trim($_POST['emailForm'] ?? '');
    $senhaForm = trim($_POST['senhaForm'] ?? '');

    if (!empty($emailForm) && !empty($senhaForm)) {
        $loginModel = new LoginModel();
        $usuarioLogin = $loginModel->LoginModelUsuario($emailForm, $senhaForm);

        if ($usuarioLogin) {
            // Guarda informações do usuário na sessão
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['perfil'] = $usuario['perfil'];

            header('Location: ../index.php', true);
            exit();
        } else {
            // Login inválido
            $_SESSION['erro_login'] = "Email ou senha incorretos";
            header('Location: ../view/pages/login.php', true);
            exit();
        }
    } else {
        $_SESSION['erro_login'] = "Preencha todos os campos";
        header('Location: ../view/pages/login.php', true);
        exit();
    }
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
//     } else {
//         echo "Não entrou no primeiro if";
//     }
// }

?>