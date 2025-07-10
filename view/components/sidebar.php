<div class="button-side-mobile-div hidden">
    <button class="button-side-mobile" id="buttonSideMobile">
        <i class="fa-solid fa-bars" id="barsIcon"></i>
    </button>
</div>

<div class="side-container-mobile-area hidden" id="sideContainerMobileArea">

    <?php if (isset($_SESSION['perfil'])) { ?>
        <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
            <!-- ASIDE DO ADM -->
            <aside class="aside-area">
                <div class="aside-content" id="sideAdministrador">
                    <a href="/together/view/pages/Adm/OngsAValidar.php" class="aside-button"> <i id="validarOngsIcon" class="fa-solid fa-building"></i> </a>
                    <a href="/together/view/pages/Adm/gestaoDePatrocinadores.php" class="aside-button" id="categoriaButton"> <i id="patrocinadoresIcon" class="fa-solid fa-hand-holding-dollar"></i> </a>
                    <a href="/together/view/pages/Adm/visualizarUsuario.php" class="aside-button"> <i id="usuariosCadastradosIcon" class="fa-solid fa-user"></i> </a>
                    <a href="/together/view/pages/Adm/visualizarOngs.php" class="aside-button"> <i id="ongsCadastradasIcon" class="fa-solid fa-building-circle-check"></i> </a>
                </div>
            </aside>

        <?php } elseif ($_SESSION['perfil'] === 'Ong') { ?>
            <!-- ASIDE DA ONG -->
            <aside class="aside-area">
                <div class="aside-content" id="sideOng">
                    <a href="/together/view/pages/visaoSobreaOng.php" class="aside-button" id="categoriaButton"> <i id="visaoSobreOng" class="fa-solid fa-address-card"></i> </a>
                    <a href="/together/view/pages/Usuario/editarInformacoes.php" class="aside-button"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                    <a href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                    <a href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
                    <a href="/together/view/pages/Ong/criarPostagemOng.php" class="aside-button"> <i id="criarIcon" class="fa-solid fa-square-plus"></i> </a>
                    <a href="/together/view/pages/Ong/relatorioOng.php" class="aside-button"> <i id="relatorioIcon" class="fa-solid fa-book"></i> </a>
                    <a href="/together/view/pages/Ong/validacaoVoluntario.php" class="aside-button"> <i id="voluntariosPendentes" class="fa-solid fa-user-clock"></i> </a>
                    <a href="/together/view/pages/Ong/voluntariosOng.php" class="aside-button"> <i id="userIcon" class="fa-solid fa-users"></i> </a>
                </div>
            </aside>

        <?php  } elseif ($_SESSION['perfil'] === 'Usuario') { ?>
            <!-- ASIDE DO USUARIO -->
            <aside class="aside-area">
                <div class="aside-content" id="sideUsuario">
                    <a href="/together/view/pages/Usuario/editarInformacoes.php" class="aside-button"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                    <a href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                    <a href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
                </div>
            </aside>

        <?php } ?>

    <?php } ?>

</div>

<div class="side-container-area">

    <?php if (isset($_SESSION['perfil'])) { ?>
        <?php if ($_SESSION['perfil'] === 'Administrador') { ?>
            <!-- ASIDE DO ADM -->
            <aside class="aside-area">
                <div class="aside-content" id="sideAdministrador">
                    <a href="/together/view/pages/Adm/OngsAValidar.php" class="aside-button"> <i id="validarOngsIcon" class="fa-solid fa-building"></i> </a>
                    <a href="/together/view/pages/Adm/gestaoDePatrocinadores.php" class="aside-button" id="categoriaButton"> <i id="patrocinadoresIcon" class="fa-solid fa-hand-holding-dollar"></i> </a>
                    <a href="/together/view/pages/Adm/visualizarUsuario.php" class="aside-button"> <i id="usuariosCadastradosIcon" class="fa-solid fa-user"></i> </a>
                    <a href="/together/view/pages/Adm/visualizarOngs.php" class="aside-button"> <i id="ongsCadastradasIcon" class="fa-solid fa-building-circle-check"></i> </a>
                </div>
            </aside>

        <?php } elseif ($_SESSION['perfil'] === 'Ong') { ?>
            <!-- ASIDE DA ONG -->
            <aside class="aside-area">
                <div class="aside-content" id="sideOng">
                    <a href="/together/view/pages/visaoSobreaOng.php" class="aside-button" id="categoriaButton"> <i id="visaoSobreOng" class="fa-solid fa-address-card"></i> </a>
                    <a href="/together/view/pages/Usuario/editarInformacoes.php" class="aside-button"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                    <a href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                    <a href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
                    <a href="/together/view/pages/Ong/criarPostagemOng.php" class="aside-button"> <i id="criarIcon" class="fa-solid fa-square-plus"></i> </a>
                    <a href="/together/view/pages/Ong/relatorioOng.php" class="aside-button"> <i id="relatorioIcon" class="fa-solid fa-book"></i> </a>
                    <a href="/together/view/pages/Ong/validacaoVoluntario.php" class="aside-button"> <i id="voluntariosPendentes" class="fa-solid fa-user-clock"></i> </a>
                    <a href="/together/view/pages/Ong/voluntariosOng.php" class="aside-button"> <i id="userIcon" class="fa-solid fa-users"></i> </a>
                </div>
            </aside>

        <?php  } elseif ($_SESSION['perfil'] === 'Usuario') { ?>
            <!-- ASIDE DO USUARIO -->
            <aside class="aside-area">
                <div class="aside-content" id="sideUsuario">
                    <a href="/together/view/pages/Usuario/editarInformacoes.php" class="aside-button"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                    <a href="/together/view/pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                    <a href="/together/view/pages/Usuario/historicoDoacao.php" class="aside-button"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
                </div>
            </aside>

        <?php } ?>

    <?php } ?>

</div>