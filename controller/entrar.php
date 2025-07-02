<?php 
session_start();

$_SERVER['perfil'] = "Visitante";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    if (!empty($emailForm) && !empty($senhaForm)) {
        $usuarios = [

            [
                'email' => 'adm@email.com',
                'senha' => password_hash('12345678',PASSWORD_BCRYPT),
                'perfil' => 'Administrador',
            ],
            [
                'email' => 'ong@email.com',
                'senha' => password_hash('12345678',PASSWORD_BCRYPT),
                'perfil' => 'Ong',
            ],
            [
                'email' => 'usuario@email.com',
                'senha' => password_hash('12345678',PASSWORD_BCRYPT),
                'perfil' => 'Usuario',
            ],
        ];
        foreach ($usuarios as $usuario) {
            if ($emailForm === $usuario['email'] && password_verify($senhaForm, $usuario['senha'])) {
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['perfil'] = $usuario['perfil'];

                return header ('Location: ../index.php');
            } else {
                header ('Location: ../view/pages/login.php');
            }
        }
    }
}

?>