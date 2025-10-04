<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["categorias"])) {
        session_start();
        $categoria = $_POST["categorias"];
        $_SESSION['categoria'] = $categoria;
        header('Location: /together/view/pages/pesquisarOng.php');
        exit;
    } else {
        unset($_SESSION['categoria']);
        header('Location: /together/view/pages/pesquisarOng.php');
        exit;
    }
}
