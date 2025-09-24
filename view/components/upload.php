<?php

/* 
Como usar:
1 - fazer require_once "./../../components/upload.php";
2 - $preview = new ImagemPreview($imagem['id']);
3 - <?php $preview->preview() ?> (recomendacao: adicionar no lugar do require_once que ficava na view)

$imagem['id'] = precisa do id da Imagem para funcionar, ou seja, precisa fazer uma consulta sql para pegar o idImagem, após isso executar os passos acima!
*/

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

            <?php if (!$this->imagem): ?>
               <div class="icon-upload"> <?= renderAcao('upload') ?> </div>
               <div class="text">
                  <span>Insira uma imagem</span>
               </div>
            <?php endif; ?>

            <input type="file" id="file" name="file" accept="image/*">

            <img id="preview"
               src="<?= $this->imagem ? $this->imagem['caminho'] : '#' ?>"
               alt="<?= $this->imagem['nome_original'] ?>">

         </label>
      </div>
<?php
   }
}
