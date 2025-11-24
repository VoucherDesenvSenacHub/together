<div class="side-container-mobile-area hidden" id="sideContainerMobileArea">

    <?php if (isset($_SESSION['perfil'])) { ?>
    <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
    <aside class="aside-area-mobile">
        <div class="aside-content-mobile" id="sideAdministrador">

            <a title="Validar Ongs" href="/together/view/pages/Adm/OngsAValidar.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Validar Ongs</p>
            </a>

            <a title="Patrocinadores" href="/together/view/pages/Adm/gestaoDePatrocinadores.php" class="aside-button-mobile" id="categoriaButton">
                <p class="mobile-side-legenda">Patrocinadores</p>
            </a>

            <a title="Usuarios Cadastrados" href="/together/view/pages/Adm/visualizarUsuario.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Usuarios Cadastrados</p>
            </a>

            <a title="Ongs Cadastrados" href="/together/view/pages/Adm/visualizarOngs.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Ongs Cadastradas</p>
            </a>

            <a title="Sair" href="/together/controller/SairController.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Sair</p>
            </a>

        </div>
    </aside>

    <?php } elseif ($_SESSION['perfil'] === 'Ong') { ?>
    <aside class="aside-area-mobile">
        <div class="aside-content-mobile" id="sideOng">

            <a title="Editar Perfil" href="/together/view/pages/editarInformacoes.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Editar Perfil</p>
            </a>

            <a title="Ongs Voluntariado" href="/together/view/pages/usuario/usuarioOngsVoluntarias.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Ongs Voluntariado</p>
            </a>

            <a title="Historico" href="/together/view/pages/usuario/historicoDoacao.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Historico</p>
            </a>
        
            <hr class="divisor-mobile">

            <a title="Visão sobre Ong" href="/together/view/pages/visaoSobreaOng.php" class="aside-button-mobile" id="categoriaButton">
                <p class="mobile-side-legenda">Visão Sobre Ong</p>
            </a>

            <a title="Criar Postagem" href="/together/view/pages/Ong/criarPostagemOng.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Criar Postagem</p>
            </a>

            <a title="Relatorio" href="/together/view/pages/Ong/relatorioOng.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Relatorio</p>
            </a>

            <a title="Voluntarios Pendentes da Ong" href="/together/view/pages/Ong/validacaoVoluntario.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Voluntarios Pendentes da Ong</p>
            </a>

            <a title="Voluntarios" href="/together/view/pages/Ong/voluntariosOng.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Voluntarios</p>
            </a>

            <a title="Sair" href="/together/controller/SairController.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Sair</p>
            </a>

        </div>
    </aside>

    <a href="/together/controller/SairController.php">
                <p class="mobile-side-legenda">Sair</p>
            </a><?php } elseif ($_SESSION['perfil'] === 'Usuario') { ?>
    <aside class="aside-area-mobile">
        <div class="aside-content-mobile" id="sideUsuario">
            <a href="/together/view/pages/Usuario/editarInformacoes.php" class="aside-button-mobile"> 
                <p class="mobile-side-legenda">Editar Informacoes</p>    
            </a>
            <a href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button-mobile"> 
                <p class="mobile-side-legenda">Ongs que sou Voluntario</p>    
            </a>
            <a href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button-mobile"> 
                <p class="mobile-side-legenda">Historico de Docação</p>
            </a>

            <a title="Sair" href="/together/controller/SairController.php" class="aside-button-mobile">
                <p class="mobile-side-legenda">Sair</p>
            </a>
        </div>
    </aside>

    <?php } ?>

    <?php } ?>

</div>

<div class="side-container-area">

    <?php if (isset($_SESSION['perfil'])) { ?>
    <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
    <aside class="aside-area">
        <div class="aside-content" id="sideAdministrador">

            <a title="Validar Ongs" href="/together/view/pages/Adm/OngsAValidar.php" class="aside-button">
                <i id="validarOngsIcon" class="fa-solid fa-building"></i>

            </a>

            <a title="Patrocinadores" href="/together/view/pages/Adm/gestaoDePatrocinadores.php" class="aside-button"
                id="categoriaButton">
                <i id="patrocinadoresIcon" class="fa-solid fa-hand-holding-dollar"></i>

            </a>

            <a title="Usuarios Cadastrados" href="/together/view/pages/Adm/visualizarUsuario.php" class="aside-button">
                <i id="usuariosCadastradosIcon" class="fa-solid fa-user"></i>

            </a>

            <a title="Ongs Cadastrados" href="/together/view/pages/Adm/visualizarOngs.php" class="aside-button">
                <i id="ongsCadastradasIcon" class="fa-solid fa-building-circle-check"></i>

            </a>

        </div>
    </aside>

    <?php } elseif ($_SESSION['perfil'] === 'Ong') { ?>
    <aside class="aside-area">
        <div class="aside-content" id="sideOng">

            <a title="Editar Perfil" href="/together/view/pages/editarInformacoes.php" class="aside-button">
                <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i>
            </a>

            <a title="Ongs Voluntariado" href="/together/view/pages/usuario/usuarioOngsVoluntarias.php"
                class="aside-button">
                <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i>
            </a>

            <a title="Historico" href="/together/view/pages/usuario/historicoDoacao.php" class="aside-button">
                <i id="historicoIcon" class="fa-solid fa-clock"></i>
            </a>
        </div>

        <div class="aside-content">

            <a title="Visão sobre Ong" href="/together/view/pages/visaoSobreaOng.php" class="aside-button"
                id="categoriaButton">
                <i id="visaoSobreOng" class="fa-solid fa-address-card"></i>
            </a>

            <a title="Criar Postagem" href="/together/view/pages/Ong/criarPostagemOng.php" class="aside-button">
                <i id="criarIcon" class="fa-solid fa-square-plus"></i>
            </a>

            <a title="Relatorio" href="/together/view/pages/Ong/relatorioOng.php" class="aside-button">
                <i id="relatorioIcon" class="fa-solid fa-book"></i>
            </a>

            <a title="Voluntarios Pendentes da Ong" href="/together/view/pages/Ong/validacaoVoluntario.php"
                class="aside-button">
                <i id="voluntariosPendentes" class="fa-solid fa-user-clock"></i>
            </a>

            <a title="Voluntarios" href="/together/view/pages/Ong/voluntariosOng.php" class="aside-button">
                <i id="userIcon" class="fa-solid fa-users"></i>
            </a>

        </div>
    </aside>

    <?php } elseif ($_SESSION['perfil'] === 'Usuario') { ?>
    <aside class="aside-area">
        <div class="aside-content" id="sideUsuario">

            <a title="Editar Perfil" href="/together/view/pages/editarInformacoes.php" class="aside-button">
                <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i>
            </a>

            <a title="Ongs Voluntariado" href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php"
                class="aside-button">
                <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i>
            </a>

            <a title="Historico" href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button">
                <i id="historicoIcon" class="fa-solid fa-clock"></i>
            </a>

        </div>
    </aside>

    <?php } ?>

    <?php } ?>

</div>