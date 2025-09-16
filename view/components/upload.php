<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controller/ImagemController.php';

// Instancia a conexão
$db = new Database();
$conn = $db->conectar();  // <- aqui temos o PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $imagemController = new ImagemController($conn);
        $caminho = $imagemController->salvarImagem($_FILES['file']);
        echo "<p>Imagem salva com sucesso! Caminho: $caminho</p>";
    } catch (Exception $e) {
        echo "<p>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
   <div class="formulario-imagem-preview">
      <label class="custum-file-upload" for="file">
         <div class="icon-upload"> ...svg aqui... </div>
         <div class="text"><span>Insira uma imagem</span></div>
         <input type="file" id="file" name="file" accept="image/*">
         <img id="preview" src="#" alt="">
      </label>
   </div>
   <button type="submit">Enviar</button>
</form>
