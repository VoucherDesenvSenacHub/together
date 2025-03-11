<!-- JA EXISTE UMA NAV BAR, TIRA ESSA DE VCS E CHAMA A QUE EXISTE PELO REQUIRE -->

<?php require_once './../../components/head.php'?>


<body>
    <?php
        // eespaço para adicionar lógica PHP, se necessário. Decidam se vão ou não manter esse bloco
    ?>
    <header>
        <nav class="navbar">
            <?php require_once './../../components/navbar.php'?>
            <!-- Conteúdo do menu de navegação -->
        </nav>
    </header>
    <div class="container-geral-painel-de-controle-adm">
        <div class="box-painel-de-controle-adm">
            <div class="conteudo-painel-de-controle-adm">
                <div class="conteudo-interno">
                    <img class="icone-conteudo" src="assets/icone-atualizacoes-cadastrais.svg" alt="atualizacoes cadastrais SVG">
                    <h2 class="titulo-conteudo"><b>Atualizações Cadastrais</b></h2>
                    <span class="desc-conteudo">Valide as atualizações cadastrais das ONGs que enviaram uma solicitação.</span>
                </div>
                <div class="conteudo-interno">
                    <img class="icone-conteudo" src="assets/icone-validar-ongs.svg" alt="validar ongs SVG">
                    <h2 class="titulo-conteudo"><b>Validar ONGs</b></h2>
                    <span class="desc-conteudo">Valide por aqui as ONGs que enviaram uma solicitação.</span>
                </div>
                <div class="conteudo-interno">
                    <img class="icone-conteudo" src="assets/icone-ongs-usuarios-cadastrados.svg" alt="ongs usuarios cadastrados SVG">
                    <h2 class="titulo-conteudo"><b>ONGs / Usuários Cadastatrados</b></h2>
                    <span class="desc-conteudo">Veja por aqui as ONGs e Usuários que estão permitidas pelo sistema.</span>
                </div>

                <div class="conteudo-interno">
                    <img class="icone-conteudo" src="assets/icone-editar.svg" alt="editar SVG">
                    <h2 class="titulo-conteudo"><b>Editar</b></h2>
                    <span class="desc-conteudo">Edite as Tags do botão de filtrar</span>
                </div>
                <div  class="conteudo-interno">
                    <a href="../adm-gestao-de-patrocinadores/index.html">
                        <img class="icone-conteudo img-patrocinadores" src="assets/patrocinadores.png" alt="patrocinadores PNG">
                    </a>
                    <h2 class="titulo-conteudo"><b>Patrocinadores</b></h2>
                    <span class="desc-conteudo">Gerencie os Patrocinadores</span>
                </div>        
            </div>
        </div>
    </div>
</body>
</html>
