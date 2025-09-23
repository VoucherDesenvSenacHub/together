<?php

require_once __DIR__ . '/../model/ImagemModel.php';

class UploadController
{
    public function processar($imagem, $idExistente)
    {
        $diretorioDestino = __DIR__ . "/../upload/";

        // validar tipo e extensão
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

        // tamanho máximo 16MB
        $tamanhoMaximoDoArquivoEmBytes = 16 * 1024 * 1024;
        if ($imagem["size"] > $tamanhoMaximoDoArquivoEmBytes) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Tamanho do arquivo foi excedido!';
            return false;
        }

        // Criar o diretorio upload caso não haja
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino);
        }

        $nomeUnico = uniqid() . '_' . $imagem["name"];
        $caminhoDestino = $diretorioDestino . $nomeUnico;

        // Salvar no banco o caminho relativo com /together
        $caminhoRelativo = '/together/upload/' . $nomeUnico;

        $caminhoTemporario = $imagem["tmp_name"];
        if (!move_uploaded_file($caminhoTemporario, $caminhoDestino)) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao mover o arquivo!';
            return false;
        }

        $imagemModel = new ImagemModel();

        if ($idExistente) {
            $imagemModel->atualizar($idExistente, $nomeUnico, $imagem["name"], $caminhoRelativo);
            return $idExistente; // retorna o id existente
        } else {
            // Retorna o id da nova imagem criada
            return $imagemModel->criar($nomeUnico, $imagem["name"], $caminhoRelativo);
        }
    }
}
