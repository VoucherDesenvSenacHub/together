<?php
require_once __DIR__ . '/../model/ImagemModel.php';

class ImagemController {
    private $imagemModel;
    private $uploadDir;

    public function __construct($conn) {   // <- recebe a conexão
        $this->imagemModel = new ImagemModel($conn);
        $this->uploadDir = __DIR__ . '/../uploads/';
    }

    public function salvarImagem($file) {
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erro ao enviar arquivo.");
        }

        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extensao, $permitidas)) {
            throw new Exception("Formato de arquivo não permitido.");
        }

        $novoNome = uniqid('img_', true) . '.' . $extensao;

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
        $caminhoFinal = $this->uploadDir . $novoNome;

        if (!move_uploaded_file($file['tmp_name'], $caminhoFinal)) {
            throw new Exception("Erro ao salvar arquivo no servidor.");
        }

        $caminhoRelativo = 'uploads/' . $novoNome;

        // Salvar no banco
        $this->imagemModel->salvar($novoNome, $file['name'], $caminhoRelativo);

    }
}
