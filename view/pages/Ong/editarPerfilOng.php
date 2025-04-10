<?php require_once "../../../view/components/head.php"; ?>

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="formulario-perfil">
            <form action="">
                <div class="formulario-linha-superior">
                    <div class="formulario-imagem-preview">
                        <?php require_once "./../../components/"?>
                    </div>
                    <div class="formulario-campos">
                        <label class="formulario-label" for="titulo">Título</label>
                        <input class="formulario-input" type="text" id="titulo" />

                        <label class="formulario-label" for="subtitulo">Subtítulo</label>
                        <textarea class="formulario-textarea" id="subtitulo" rows="3"></textarea>
                    </div>
                </div>

                <label class="formulario-label" for="descricao">Descrição</label>
                <textarea class="formulario-textarea" id="descricao" rows="4"></textarea>

                <div class="formulario-redes-buttons">
                    <div class="formulario-redes-sociais">
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
                            <input type="text" placeholder="@" />
                        </div>
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram">
                            <input type="text" placeholder="@" />
                        </div>
                        <div class="formulario-rede-social">
                            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="X">
                            <input type="text" placeholder="@" />
                        </div>
                    </div>

                    <div class="formulario-buttons">
                        <button class="botao salvar" type="submit">Salvar</button>
                        <button class="botao cancelar" type="reset">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
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