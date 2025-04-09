<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php'?>
        
    </main>
    <div class="container-titulo">
        <label class="titulo-label" for="">Titulo</label> 
        <input class="entrada-titulo" type="text" placeholder=""> 
    </div>

    <div class="container-subtitulo" >
        <label for="">Subtitulo</label>
        <input  class="entrada-subtitulo" type="text" placeholder="">
    </div>

    <div class="container-descricao" >
        <label for="">Descrição</label>
        <input  class="entrada-descricao" type="text" placeholder="">
    </div>


</body>