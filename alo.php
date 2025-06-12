<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seja a Mudança</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #fff6d5;
    }

    .secao {
      position: relative;
      height: 300px; /* altura total da seção */
    }

    .imagem-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
      pointer-events: none;
    }

    .imagem-container img {
      width: 200px;
      height: 100%;
      object-fit: cover;
    }

    .conteudo {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #1a1a1a;
      color: #fff0c2;
      /* padding: 60px 0px; */
      z-index: 1;
    }

    .texto {
      max-width: 800px;
      margin: auto;
      text-align: center;
    }

    h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.2em;
      line-height: 1.6em;
    }
  </style>
</head>
<body>

  <section class="secao">
    <div class="imagem-container">
      <img src="\together\view\assests\images\Geral\banner-cadastrar.png" alt="Voluntários">
    </div>

    <div class="conteudo">
      <div class="texto">
        <h1>Seja a Mudança Que Você Quer Ver no Mundo!</h1>
        <p>
          Doe seu tempo, seu talento e seu coração. Encontre causas que combinam com você e faça parte de projetos que realmente transformam vidas.
          Ser voluntário é mais do que ajudar — é crescer, aprender e fazer a diferença todos os dias.
          Cadastre-se e comece sua jornada de impacto!
        </p>
      </div>
    </div>
  </section>

</body>
</html>
