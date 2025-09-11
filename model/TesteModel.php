<?php 

require_once __DIR__ .'/../config/database.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $TamanhoMax = 16 * 1024 * 1024;
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg','image/webp'];
    $extensoesPermitidas = ['jpeg', 'png', 'jpg', 'webp'];


    $file = $_FILES['imagem'];

    if($file['error'] !== UPLOAD_ERR_OK){
        die("erro no upload");
    }

    if($file['size']> $TamanhoMax){
        die("Arquivo muito grande. Máximo permitido é 16 MB!");
    }

    $fileMime = mime_content_type($file['tmp_name']);
    if (!in_array($fileMime, $tiposPermitidos)) {
        die("Tipo de arquivo inválido. Só aceitamos JPEG, PNG, JPG ou WEBP.");
    }

    $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extensao, $extensoesPermitidas)) {
        die("Extensão de arquivo inválida. Extensões permitidas: jpeg, jpg, png, webp.");
    }

    $destino = "" . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $destino)) {
        echo "Upload realizado com sucesso!";
    } else {
        echo "Erro ao salvar o arquivo.";
    }
}




?>;