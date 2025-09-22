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
            throw new Exception('Tipo de arquivo inválido!');
        }

        $arquivoExtensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
        if (!in_array($arquivoExtensao, $extensoesPermitidas)) {
            throw new Exception('Extensão do arquivo inválida!');
        }

        // tamanho máximo 16MB
        $tamanhoMaximoDoArquivoEmBytes = 16 * 1024 * 1024;
        if ($imagem["size"] > $tamanhoMaximoDoArquivoEmBytes) {
            throw new Exception("Arquivo Muito Grande!");
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
            throw new Exception("Erro ao mover o arquivo!");
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
