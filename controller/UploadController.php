<?php
require_once __DIR__ . '/../model/ImagemModel.php';

class UploadController
{
    public function processar($imagem, $idExistente, $pasta)
    {
        $diretorioDestino = __DIR__ . "/../upload/$pasta/";
        $diretorioUpload = __DIR__ . "/../upload/";

       
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
        $extensoesPermitidas = ['jpeg', 'jpg', 'png', 'webp'];

        if (!in_array($imagem['type'], $tiposPermitidos)) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Tipo de arquivo inválido!';
            return false;
        }

        $arquivoExtensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
        if (!in_array($arquivoExtensao, $extensoesPermitidas)) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Extensão do arquivo inválida!';
            return false;
        }

        
        $tamanhoMaximoDoArquivoEmBytes = 16 * 1024 * 1024;
        if ($imagem["size"] > $tamanhoMaximoDoArquivoEmBytes) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Tamanho do arquivo foi excedido!';
            return false;
        }

        
        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload);
        }

        
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino);
        }

        $nomeUnico = uniqid() . '_' . $imagem["name"];
        $caminhoDestino = $diretorioDestino . $nomeUnico;

       
        $caminhoRelativo = "/together/upload/$pasta/" . $nomeUnico;

        $caminhoTemporario = $imagem["tmp_name"];
        if (!move_uploaded_file($caminhoTemporario, $caminhoDestino)) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao mover o arquivo!';
            return false;
        }

        $imagemModel = new ImagemModel();

        if ($idExistente) {
            $imagemModel->atualizar($idExistente, $nomeUnico, $imagem["name"], $caminhoRelativo);
            return $idExistente; 
        } else {
            
            return $imagemModel->criar($nomeUnico, $imagem["name"], $caminhoRelativo);
        }
    }
}
