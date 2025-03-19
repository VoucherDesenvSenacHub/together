<header>
    <nav class="navbar-group">
        <a class="a-navbar" href="/together/index.php"><img class="logoimg" src="/together/view/assests/images/components/Together.png" alt="logo"></a>
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

            <li>
                <a class="a-navbar" href="/together/view/pages/adm/painelDeControle.php">Administração</a>
            </li>

            <li>
                <a class="a-navbar" href="/together/view/pages/usuario/loginUsuario.php">Entrar</a>
            </li>
        </ul>
        <div class="search-button-area">
            <button id="searchBarButton" class="barra-pesquisa-button" >
                <i class="fa fa-search" id="lente-button-icon"></i>
            </button>
        </div>
        <div id="searchBar" class="search-bar-area hidden">
            <input class="search-bar" type="text">
            <button class="submit-lente">
                <i class="fa fa-search" id="lente-icon"></i>
            </button>
        </div>
        <div id="imageArea" class="image-area"></div>


        <div id="lateralBar" class="lateral-bar hidden">
            <div class="lateral-bar-top">
                <h3 class="h3-lateral-bar">Nome de Usuario</h3>
                <button id="imageLateralBar" class="image-lateral-bar"></button>
            </div>

            <div class="search-bar-mobile-area hidden">
                <input type="text" class="searchMobileBar">
                <i class="fa fa-search" id="mobile-lente-icon"></i>
            </div>

            <div class="lateral-bar-content">
                <i class="fa-solid fa-heart" id="favoritosIcon"></i>
                <i class="fa-solid fa-clock" id="historicoIcon"></i>
                <i class="fa-solid fa-gear" id="configIcon"></i>
                <i class="fa-solid fa-arrow-right-from-bracket" id="logoutIcon"></i>
                <a class="a-navbar" href="#" id="favoritosButton">Favoritos</a>
                <a class="a-navbar" href="#" id="historicoButton">Historico de doações</a>
                <a class="a-navbar" href="#" id="configButton">Gerenciar conta</a>
                <a class="a-navbar" href="#" id="logoutButton">Sair</a>
            </div>
        </div>

        
    </nav>
</header>



<body>
    <div id="filtrarArea" class="filtrar-area hidden">
            <ol id="filtrarList" class="filtrar-list hidden">
                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Erradicação da Pobreza</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Fome Zero e Agricultura Sustentável</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Saúde e Bem-Estar</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Educação de Qualidade</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Igualdade de Gênero</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Água Potável e Saneamento</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Energia Limpa e Acessível</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Trabalho Decente e Crescimento Econômico</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Indústria, Inovação e Infraestrutura</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Redução das Desigualdades</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Cidades e Comunidades Sustentáveis</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Consumo e Produção Responsáveis</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Ação Contra a Mudança Global do Clima</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Vida na ÁguaVida Terrestre</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Vida TerrestrePaz, Justiça e Instituições Eficazes</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Paz, Justiça e Instituições EficazesParcerias e Meios de Implementação</p>
                </li>

                <li class="filtrar-list-line">
                    <input id="listCheckbox" type="checkbox">
                    <p class="p-filtrarArea">Parcerias e Meios de Implementação</p>
                </li>

            </ol>
        </div>


        <button id="mobileButton" class="mobile-button"><i class="fa-solid fa-bars" id="bars-icon"></i></button>
        <div id="circleChoice" class="circle-choice hidden">
            <button id="barsCircleButton">
                <i class="fa-solid fa-bars" id="bars-icon"></i>
            </button>
            <a class="a-navbar" href="#" id="homeButton">Home</a>
            <a class="a-navbar" href="#" id="filtrarButton">Filtrar</a>
            <a class="a-navbar" href="#" id="feedButton">Feed</a>
            <a class="a-navbar" href="#" id="sobreNosButton">Sobre Nós</a>
        </div>
</body>