<?php 

session_start();

// Limpar as informações da sessão atual
session_unset();

// Invalidar e remover a sessão no PHP
session_destroy();


header('Location: ../index.php')
?>