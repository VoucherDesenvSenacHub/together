<?php
require_once './../../components/acoes.php';
require_once __DIR__ . "/../../model/ImagemModel.php";

class ImagemPreview
{
   private $id;
   private $imagemModel;
   private $imagem;

   public function __construct($id)
   {
      $this->id = $id;
      $this->imagemModel = new ImagemModel();
      $this->imagem = $this->imagemModel->buscarImagemPorId($this->id);
   }

   public function preview()
   {
?>
      <div class="formulario-imagem-preview">
         <label class="custum-file-upload" for="file">
            <div class="icon-upload"> <?= renderAcao('upload') ?> </div>
            <div class="text">
               <span>Insira uma imagem</span>
            </div>
            <input type="file" id="file" name="file" accept="image/*">
            <img id="preview"
               src="<?= $this->imagem ? $this->imagem['caminho'] : '#' ?>"
               alt="Preview da imagem">
         </label>
      </div>
<?php
   }
}
