<?php require_once './../../components/head.php' ?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <div class="container-geral-painel-de-controle-adm">
        <div class="box-painel-de-controle-adm">
            <div class="conteudo-painel-de-controle-adm">
                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/adm/validarAtualizacaoOng.php">
                        <i class="fa-solid fa-file-signature fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>Atualizações Cadastrais</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Valide as atualizações cadastrais das ONGs que
                        enviaram uma
                        solicitação.</span>
                </div>
                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <i class="fa-solid fa-building-circle-check fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>Validar ONGs</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Valide por aqui as ONGs que enviaram uma
                        solicitação.</span>
                </div>
                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/Adm/visualizarOngs.php">
                        <i class="fa-solid fa-building fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>ONGs Cadastradas</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Veja por aqui as ONGs que estão permitidas pelo sistema.</span>
                </div>
                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/Adm/visualizarUsuario.php">
                        <i class="fa-solid fa-user fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>Usuários Cadastrados</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Veja por aqui os Usuários que estão permitidos pelo sistema.</span>
                </div>

                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/emDesenvolvimento.php">
                        <i class="fa-solid fa-pen-to-square fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>Editar</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Edite as Tags do botão de filtrar</span>
                </div>
                <div class="conteudo-interno-painel-de-controle">
                    <a href="/together/view/pages/adm/gestaoDePatrocinadores.php">
                        <i class="fa-solid fa-hand-holding-dollar fa-6x" style="color: #ee8d7e;"></i>
                    </a>
                    <h2 class="painel-de-controle-titulo-conteudo"><b>Patrocinadores</b></h2>
                    <span class="painel-de-controle-desc-conteudo">Gerencie os Patrocinadores</span>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './../../components/footer.php' ?>
</body>

</html>