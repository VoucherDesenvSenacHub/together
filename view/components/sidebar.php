<div class="button-sidebar"></div>


<?php if(isset($_SESSION['perfil'])) { ?>
    <?php if($_SESSION['perfil'] === 'Administrador') { ?>
        <!-- ASIDE DO ADM -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="../pages/Adm/OngsAValidar.php" class="aside-button"> <i id="validarOngsIcon" class="fa-solid fa-building"></i> </a>
                <a href="../pages/Adm/gestaoDePatrocinadores.php" class="aside-button" id="categoriaButton"> <i id="patrocinadoresIcon" class="fa-solid fa-hand-holding-dollar"></i> </a>
                <a href="../pages/Adm/visualizarUsuario.php" class="aside-button"> <i id="usuariosCadastradosIcon" class="fa-solid fa-user"></i> </a>
                <a href="../pages/Adm/visualizarOngs.php" class="aside-button"> <i id="ongsCadastradasIcon" class="fa-solid fa-building-circle-check"></i> </a>
            </div>
        </aside>

    <?php } elseif($_SESSION['perfil'] === 'Ong') { ?>
        <!-- ASIDE DA ONG -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="../pages/Ong/voluntariosOng.php" class="aside-button"> <i id="userIcon" class="fa-solid fa-users"></i> </a>
                <a href="../pages/Ong/editarPaginaOng.php" class="aside-button" id="categoriaButton"> <i id="editarPaginaIcon" class="fa-solid fa-file-pen"></i> </a>
                <a href="../pages/Ong/criarPostagemOng.php" class="aside-button"> <i id="criarIcon" class="fa-solid fa-square-plus"></i> </a>
                <a href="../pages/Ong/relatorioOng.php" class="aside-button"> <i id="relatorioIcon" class="fa-solid fa-book"></i> </a>
                <a href="../pages/Ong/editarPostagemOng.php" class="aside-button"> <i id="editarPostagemIcon" class="fa-solid fa-square-pen"></i> </a>
            </div>
        </aside>

    <?php  } elseif($_SESSION['perfil'] === 'Usuario') { ?>
        <!-- ASIDE DO USUARIO -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="../pages/Usuario/editarInformacoes.php" class="aside-button"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                <a href="../pages/Usuario/usuarioOngsVoluntarias.php" class="aside-button"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                <a href="../pages/Usuario/historicoDoacao.php" class="aside-button"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
            </div>
        </aside>

    <?php } ?>
    
<?php }?>