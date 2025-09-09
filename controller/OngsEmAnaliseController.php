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
    $database = new Database();
    $conn = $database->conectar();
    $idOng = $_SESSION['idOngValidar'];
    $tipo = $_POST["tipo_alteracao"];

        $query = "UPDATE ongs SET status_validacao = :tipo 
        WHERE id = :id;
        
        IF(:tipo = 'aprovado', UPDATE usuarios U SET U.tipo_perfil = 'Ong' 
        JOIN ongs O
        ON O.id_usuario = U.id
        WHERE O.id = :id,'');";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $idOng, PDO::PARAM_INT);
        $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);        
        $stmt->execute();
        

        header("Location: /together/view/pages/adm/OngsAValidar.php");
        exit();
    }
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header('Location: /together/view/pages/Adm/OngsAValidar.php');
}