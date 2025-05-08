<?php require_once "head.php"; ?>

<header>
    <nav class="navbar-group">
        <a class="a-navbar" href="/together/index.php"><img class="logo-navbar" src="/together/view/assests/images/components/Together.png" alt="logo"></a>
        <ul class="ul-navbar">
            <li>
                <a class="a-navbar" href="/together/index.php">Home</a>
            </li>

            <li>
                <a class="a-navbar" id="filtrarTopButton" href="#">Filtrar</a>
            </li>

            <li>
                <a class="a-navbar" href="/together/view/pages/ong/ongAdmin.php">Ongs</a>
            </li>

            <li>
                <a class="a-navbar" href="/together/index.php#sobre-nos">Sobre Nós</a>
            
            </li>
        </ul>

        <div class="div-barra-pesquisa-botao hidden">
            <button id="barraPesquisaBotao" class="barra-pesquisa-button" >
                <i class="fa fa-search" id="lente-button-icon"></i>
            </button>
        </div>

        <div id="barraPesquisa" class="div-barra-pesquisa">
            <input class="barra-pesquisa-input" type="text">
            <button class="submit-lente">
                <i class="fa fa-search" id="lente-icon"></i>
            </button>
        </div>

        <div class="login-botao-area-navbar">
            <button class="login-botao-navbar">
                LOGIN
            </button>
        </div>
        
</header>


