<?php require_once './view/components/button.php' ?>
<?php require_once './view/components/head.php' ?>
<?php require_once './view/components/card.php' ?>
<?php require_once './view/components/alert.php' ?>
<?php require_once './model/OngModel.php' ?>

<body>

    <?php
    $ongModel = new OngModel();
    $ongs = $ongModel->ongsEmDestaque();
    
    // msg de erro ao tentar cadastrar-se sem estar logado como Usuario
    if (isset($_GET['redirect']) && $_GET['redirect'] === 'cadastrarOng') {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Você precisa estar logado como Usuario!';
    }

    // Popup do session
    if (isset($_SESSION['type'], $_SESSION['message'])) {
        showPopup($_SESSION['type'], $_SESSION['message']);
        unset($_SESSION['type'], $_SESSION['message']);
    }
    ?>

    <?php require_once './view/components/navbar.php' ?>
    <?php require_once './view/components/sidebar.php' ?>
    <main>
        <div class="home-banner-together">
            <div class="camada2">
                <div class="home-banner-img-together">
                    <img class="img-together" src="/together/view/assets/images/components/logoTogetherLogin.png" alt="">
                </div>
            </div>
        </div>
        <div class="landing-home">
            <div class="container-home">
                <div class="container-ver-mais-ongs">
                    <div class="btn-home-acao">
                        <a href="/together/view/pages/pesquisarOng.php">
                            <?= botao('primary', 'Ver Mais ONGs') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-home card-ong">
                <?php foreach ($ongs as $ong) { ?>
                    <?= cardOng(
                        $ong['foto_ong'],
                        $ong['titulo_ong'],
                        $ong['descricao_ong']
                    ) ?>
                <?php } ?>


            </div>
            <div class="linha-home"></div>
            <div class="container-home card-sobre-nos-home">
                <div class="sobre-nos-card">
                    <div class="img-home-acao voluntario">
                        <div class="camada2"></div>
                    </div>
                </div>
                <div class="sobre-nos-card">
                    <?= cardSobreNos("Torne-se um Voluntário", "Doe seu tempo, seu talento e seu coração. Encontre causas que combinam com você e faça parte de projetos que realmente transformam vidas. Ser voluntário é mais do que ajudar — é crescer, aprender e fazer a diferença todos os dias. Cadastre-se e comece sua jornada de impacto!") ?>
                    <div class="btn-home-acao">
                        <a href="/together/view/pages/pesquisarOng.php">
                            <?= botao('entrar', 'Voluntariar-se') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="linha-home bottom"></div>
            <div class="container-home card-sobre-nos-home" id="sobre-nos">
                <?= cardSobreNos("Introdução ao projeto", "Bem-vindo ao nosso site, um espaço dedicado a conectar e promover ONGs de todo o país! Nossa missão é criar uma plataforma colaborativa que ajude organizações não governamentais a compartilhar seus projetos, ampliar sua visibilidade e alcançar mais pessoas e parceiros que possam apoiar suas causas.") ?>
                <?= cardSobreNos("Nossa missão", "Acreditamos no poder da união e na força das iniciativas sociais. Nosso objetivo é reunir as melhores práticas e ações de ONGs de diversos setores, dando visibilidade a seus projetos e tornando mais fácil para voluntários, doadores e parceiros se envolverem com as causas que mais importam para eles. Juntos, podemos fazer a diferença.") ?>
            </div>
            <div class="container-home card-sobre-nos-home">
                <?= cardSobreNos("O que nos difere", "Diferente de outras plataformas, nosso site é exclusivo para ONGs, com um foco dedicado em seus desafios e necessidades. Além disso, priorizamos a autenticidade, a diversidade de causas e a inclusão, criando uma comunidade diversa e rica em soluções criativas para os problemas sociais.") ?>
                <?= cardSobreNos("História do projeto", "Nosso site foi idealizado com o objetivo de criar um ponto de encontro virtual para ONGs que buscam ampliar seu impacto. Ao longo do tempo, trabalhamos para conectar as organizações com as pessoas certas, oferecendo uma plataforma simples, eficiente e de fácil acesso.") ?>
            </div>
            <div class="container-home card-sobre-nos-home">
                <?= cardSobreNos("Nossos valores", "Valorizamos a transparência, com informações claras sobre ONGs e seus projetos.<br>Incentivamos a colaboração entre todos que queiram causar impacto positivo.<br>Defendemos a acessibilidade, permitindo que qualquer pessoa participe das ações sociais.",) ?>
                <?= cardSobreNos("Junte-se a nós", "Queremos fazer parte da transformação social. Se você é uma ONG, um voluntário ou um doador, convidamos você a se conectar conosco e fazer parte dessa rede de apoio. Explore os projetos disponíveis, participe de ações ou ajude a divulgar a causa que mais lhe toca.") ?>
            </div>
            <div class="linha-home"></div>
            <div class="container-home card-sobre-nos-home">
                <div class="sobre-nos-card">
                    <?= cardSobreNos("Torne-se uma ONG", "Cadastre sua ONG em nossa plataforma e conecte-se com pessoas que realmente querem fazer a diferença. Aqui, sua causa ganha visibilidade, apoio e parcerias para crescer e impactar ainda mais vidas. Junte-se a uma rede que acredita no poder da transformação social!") ?>
                    <div class="btn-home-acao">
                        <a href="<?= ($_SESSION['perfil'] ?? '') === 'Usuario' ? '/together/view/pages/cadastrarOng.php' : '/together/index.php?redirect=cadastrarOng' ?>">
                            <?= botao('entrar', 'Cadastrar-se') ?>
                        </a>
                    </div>
                </div>
                <div class="sobre-nos-card">
                    <div class="img-home-acao ong">
                        <div class="camada2"></div>
                    </div>
                </div>
            </div>
            <div class="linha-home bottom"></div>

        </div>
        <div class="logos">
            <div class="logos-slide">
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
                <img src="\together\view\assets\images\Adm\senac.png" />
            </div>
        </div>

    </main>

    <?php require_once './view/components/footer.php' ?>

</body>

</html>