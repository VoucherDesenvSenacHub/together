<?php
require_once __DIR__ . '/../model/ImagemModel.php';

// validar o tipo de requisição
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return header('Location: index.php');
}

// validar o conteudo do formulario
if (!isset($_FILES['imagem'])) {
    return header('Location: index.php');
}

$imagem = $_FILES["imagem"];
$diretorioDestino = "upload/";

// validar o tipo e extensão de arquivo
$tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
$extensoesPermitidas = ['jpeg', 'jpg', 'png', 'webp'];

if (!in_array($imagem['type'], $tiposPermitidos)) {
    die('Tipo de arquivo inválido!');
}

$arquivoExtensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
if (!in_array($arquivoExtensao, $extensoesPermitidas)) {
    die('Extensão do arquivo inválida!');
}


// Validação tamanho da imagem 16MB - 16.777.216
$tamanhoMaximoDoArquivoEmBytes = 16 * 1024 * 1024; 

if ($imagem["size"] > $tamanhoMaximoDoArquivoEmBytes) {
    die("Arquivo Muito Grande! ");
} 

// Criar o diretorio upload caso não haja
if (!is_dir($diretorioDestino)) {
    mkdir($diretorioDestino);
}

// Tratamento para nome de arquivo unico
$nomeUnico = uniqid() . '_' . $imagem["name"];
$caminhoDestino = $diretorioDestino . $nomeUnico;

$caminhoTemporario = $imagem["tmp_name"];
$salvou = move_uploaded_file($caminhoTemporario, $caminhoDestino);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $arquivosModel = new ImagemModel();

     if (empty($_POST['id'])){

        $sucesso = $arquivosModel->criar([
            'nome' => $nomeUnico,
            'nome_original' => $imagem["name"],
            'caminho' => $caminhoDestino
        ]);
    }
}
if ($salvou and $sucesso) {
    echo "Arquivo salvo em $caminhoDestino";
    echo "<br><a href='index.php'>Voltar</a>";
} else {
    echo "Erro ao salvar arquivo";
}