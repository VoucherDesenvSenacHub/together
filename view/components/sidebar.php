<?php if(isset($_SESSION['perfil'])) { ?>
    <?php if($_SESSION['perfil'] === 'Administrador') { ?>
        <!-- ASIDE DO ADM -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="produtos.php" class="aside-button" id="produtoButton"> <i id="validarOngsIcon" class="fa-solid fa-building"></i> </a>
                <a href="categorias.php" class="aside-button" id="categoriaButton"> <i id="patrocinadoresIcon" class="fa-solid fa-hand-holding-dollar"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="usuariosCadastradosIcon" class="fa-solid fa-user"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="#ongsCadastradasIcon" class="fa-solid fa-building-circle-check"></i> </a>
            </div>
        </aside>

    <?php } elseif($_SESSION['perfil'] === 'Ong') { ?>
        <!-- ASIDE DA ONG -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="produtos.php" class="aside-button" id="produtoButton"> <i id="userIcon" class="fa-solid fa-users"></i> </a>
                <a href="categorias.php" class="aside-button" id="categoriaButton"> <i id="editarPaginaIcon" class="fa-solid fa-file-pen"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="criarIcon" class="fa-solid fa-square-plus"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="relatorioIcon" class="fa-solid fa-book"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="editarPostagemIcon" class="fa-solid fa-square-pen"></i> </a>
            </div>
        </aside>

    <?php  } elseif($_SESSION['perfil'] === 'Usuario') { ?>
        <!-- ASIDE DO USUARIO -->
        <aside class="aside-area">
            <div class="aside-content">
                <a href="produtos.php" class="aside-button" id="produtoButton"> <i id="usuarioEdtarIcon" class="fa-solid fa-user-pen"></i></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="userVoluntariadoIcon" class="fa-solid fa-handshake-simple"></i> </a>
                <a href="usuarios.php" class="aside-button" id="userButton"> <i id="historicoIcon" class="fa-solid fa-clock"></i> </a>
            </div>
        </aside>

    <?php } ?>
    
<?php }?>