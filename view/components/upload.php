<?php require_once './../../components/acoes.php' ?>

<div class="formulario-imagem-preview">
   <label class="custum-file-upload" for="file">
      <div class="icon-upload"> <?= renderAcao('upload') ?>
      </div>
      <div class="text"><span>Insira uma imagem</span></div>
      <input type="file" id="file" name="file" accept="image/*">
      <img id="preview" src="#" alt="">
   </label>
</div>