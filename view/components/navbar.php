<?php require_once "button.php" ?>

<header>
    <nav class="navbar-group">
        <div class="logo-area">
            <a class="a-navbar" href="/together/index.php"><img class="logo-navbar" src="/together/view/assets/images/components/logo_nova_together.png" alt="logo"></a>
        </div>
        <ul class="ul-navbar">
            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php">Inicio</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/view/pages/pesquisarOng.php">Descobrir</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php#sobre-nos">Sobre Nós</a>
            </li>

            <li class="li-navbar">
                <a class="a-navbar" href="/together/index.php#footer">Contate-nos</a>    
            </li>

            <li class="li-navbar-mobile hidden">
                <a class="a-navbar-mobile" href="/together/index.php">
                    <i class="fa-solid fa-house"></i>
                </a>            
            </li>
        </ul>

        <div class="div-barra-pesquisa-botao hidden">
            <button id="barraPesquisaBotao" class="barra-pesquisa-button" >
                <i class="fa fa-search" id="lente-button-icon"></i>
            </button>
        </div>

        <div id="barraPesquisa" class="div-barra-pesquisa">
            <input class="barra-pesquisa-input" type="text" placeholder="Pesquisar Ong's">
            <button class="submit-lente">
                <i class="fa fa-search" id="lente-icon"></i>
            </button>
        </div>

        <div class="login-botao-area-navbar">
            <form action="">
            <?php if(isset($_SESSION['perfil'])) { 
                echo '<a href="/together/controller/sair.php">
                        <i class="fa-solid fa-right-from-bracket icone-sair" title="Sair" id="btn-circular"></i>
                    </a>';
            }
            else {
                echo botao('entrar','Entrar','','/together/view/pages/login.php');
            }
            ?>
            </form>
            
        </div>
        
</header>


