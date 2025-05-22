<?php require_once './view/components/button.php' ?>
<?php require_once './view/components/head.php' ?>
<?php require_once './view/components/card.php' ?>
<?php require_once './view/components/button.php' ?>

<body>
    <?php require_once './view/components/navbar.php' ?>
    <div class="home-banner-together"></div>
    <main class="main-container">
        <section class="home-main">
            <div class="home-container">
                <form class="home-div-botao">
                    <h3 class="home-title-favorite">Destaques</h3>
                    <div class="btn-destaque-home"><?= botao("primary","Ver Mais") ?></div>
                </form>
                <div class="card-container">
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                        <?= cardOng("view\assests\images\Geral\ImageONG.png","Salva Vidas!","Salvamos a vida de animais abandonados, moradores de rua e todas as pessoas necessitadas.") ?>
                    <?php }
                    ; ?>
                </div>
                <div class="sobre-nos-section" id="sobre-nos">
                    <div class="sobre-nos-container">
                        <div class="sobre-nos-content">
                            <h1>Sobre Nós</h1>
                            <p>Desenvolvemos uma plataforma para ajudar no gerenciamento de ONGs, trazendo grandes benefícios
                                para o
                                curso Técnico em Desenvolvimento de Sistemas e para a sociedade. <br><br> Nossa ferramenta
                                facilita
                                o alcance
                                para angariação de doações, voluntários, comunicação de projetos e atividades diárias das ONGs.
                                Assim,
                                suas operações ficam mais eficientes e seu impacto social é potencializado. <br><br> Com nosso
                                sistema, as ONGs
                                ganham mais eficiência e transparência, permitindo que ampliem seu alcance e eficácia em suas
                                causas.
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="sobre-nos-cards-section">
                    <div class="sobre-nos-cards-container">
                        <?= cardSobreNos("Introdução ao Projeto","Bem-vindo ao nosso site, um espaço dedicado a conectar e promover ONGs de todo o país! Nossa missão é criar uma plataforma colaborativa que ajude organizações não governamentais a compartilhar seus projetos, ampliar sua visibilidade e alcançar mais pessoas e parceiros que possam apoiar suas causas.") ?>
                        <?= cardSobreNos("Nossos Valores","Transparência: Acreditamos na importância da honestidade e clareza nas informações,tanto sobre as ONGs quanto seus projetos.","Colaboração: Fomentamos a parceria entre organizações, voluntários, doadores e qualquer pessoa interessada em causar um impacto positivo.","Acessibilidade: Queremos que todos, independentemente de sua localização ou condição, possam acessar e contribuir com iniciativas sociais.") ?>
                        <?= cardSobreNos("Nossa Missão","Acreditamos no poder da união e na força das iniciativas sociais. Nosso objetivo é reunir as melhores práticas e ações de ONGs de diversos setores, dando visibilidade a seus projetos e tornando mais fácil para voluntários, doadores e parceiros se envolverem com as causas que mais importam para eles. Juntos, podemos fazer a diferença.") ?>
                        <?= cardSobreNos("História do Projeto","Nosso site foi idealizado com o objetivo de criar um ponto de encontro virtual para ONGs que buscam ampliar seu impacto. Ao longo do tempo, trabalhamos para conectar as organizações com as pessoas certas, oferecendo uma plataforma simples, eficiente e de fácil acesso.") ?>
                        <?= cardSobreNos("O Que Nos Difere","Diferente de outras plataformas, nosso site é exclusivo para ONGs, com um foco dedicado em seus desafios e necessidades. Além disso, priorizamos a autenticidade, a diversidade de causas e a inclusão, criando uma comunidade diversa e rica em soluções criativas para os problemas sociais.") ?>
                        <?= cardSobreNos("Junte-se a Nós","Queremos fazer parte da transformação social. Se você é uma ONG, um voluntário ou um doador, convidamos você a se conectar conosco e fazer parte dessa rede de apoio. Explore os projetos disponíveis, participe de ações ou ajude a divulgar a causa que mais lhe toca.") ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once './view/components/footer.php' ?>
</body>