<?php
session_start();
require_once __DIR__ . "/../model/LoginModel.php";
require_once __DIR__ ."/../config/database.php";



try {
    // Verifica se a requisão é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método inválido para esta requisição");
    }
    if(isset($_POST["id"]) && isset($_POST['tipo_alteracao'])) {
    $conn = new Database()->conectar();
    $idOng = $_POST["id"];
    $tipo = $_POST["tipo_alteracao"];

        $query = "UPDATE ongs SET status_validacao = ':tipo' 
        WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $idOng, PDO::PARAM_INT);
        $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);        
        $stmt->execute();

        header("Location: /together/view/pages/adm/OngsAValidar.php");
        exit();
    }
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header('Location: /view/pages/Adm/OngsAValidar.php');
}