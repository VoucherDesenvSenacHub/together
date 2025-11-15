<?php
require_once __DIR__ . "/acoes.php";
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

   public function preview($disabled = false)
   {
?>
      <div class="formulario-imagem-preview">
         <label class="custum-file-upload" for="file">

            <?php if (!$this->imagem): ?>
               <div class="icon-upload"> <?= renderAcao('upload') ?> </div>
               <div class="text">
                  <span>Insira uma imagem</span>
               </div>
            <?php endif; ?>

            <input type="file" id="file" name="file" accept="image/*" <?= $disabled ? 'disabled' : '' ?>>

            <img id="preview"
               src="<?= $this->imagem ? $this->imagem['caminho'] : '#' ?>"
               alt="<?= $this->imagem ? $this->imagem['nome_original'] : null ?>">
         </label>
      </div>
<?php
   }
}
