<?php
/* 
Como usar:

   1 - require_once "./../../components/upload.php";

   2 - $preview = new ImagemPreview($imagem['id']); (SE NÃO EXISTIR ID IMAGEM PODE PASSAR NULL AO INVES DE $imagem['id])

   3 - Adicionar enctype="multipart/form-data"> no form da view
      Exemplo:
         <form action="" method="POST" enctype="multipart/form-data">

   4 - Se necessário passar o input hidden com o value do id da imagem (SE O ID IMAGEM DO **PASSO 2** FOR NULL NÃO É NECESSÁRIO)
      Comentário:
         Mas para isso precisa de uma Model para consultar o id da imagem, assim adicionando ela na variavel $imagem, para podermos passar ela com o $imagem['id']
      Exemplo:
         <input type="hidden" name="id_imagem" value="<?= $imagem['id'] ?? null ?>">

   5 - <?php $preview->preview() ?> 
      Recomendação: 
         Adicionar no lugar do <?php require_once "./../../components/upload.php" ?> que ficava na view
      Exemplo:
         <input type="hidden" name="id_imagem" value="<?= $imagem['id'] ?? null ?>">
         <?php $preview->preview() ?>
*/

require_once './../components/acoes.php';
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
               alt="<?= $this->imagem ? $this->imagem['nome_original'] : null ?>">
         </label>
      </div>
<?php
   }
}
