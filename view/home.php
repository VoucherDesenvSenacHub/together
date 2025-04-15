<?php require_once './components/head.php' ?>

<body>
    <?php require_once './components/navbar.php' ?>

    <main class="main-container">
        <div class="home-banner-together"></div>
        <div class="home-card-box">
            <h3 class="home-title-favorite">Destaques</h3>
            <div class="home-div-botao">
                <button class="botao">Ver Mais</button>
            </div>
            <div class="home-scroll-area">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <article class="card-container">
                        <div class="card-wrapper">
                            <div class="card-wrapper-top">
                                <img src="./assests/images/ong/ong_background-better.png" class="card-image" alt="Card featured image" />

                            </div>
                            <div class="card-wrapper-botton">
                                <h2 class="card-title">Tailwind card</h2>
                                
                                <p class="card-description">
                                    Lorem ipsum dolor sit amet,
                                    <br />
                                    consectetur adipiscing elit. Nunc felis
                                    <br />
                                    ligula.
                                </p>
                                <button class="read-more-button">
                                    <p class="home-button-text">Descobrir</p>
                                </button>
                            </div>
                        </div>
                    </article>
                <?php }
                ; ?>
            </div>
        </div>
        <div class="sobre-nos-section" id="sobre-nos">
            <div class="sobre-nos-text-container">
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
            <div class="sobre-nos-image-container">
                <img class="sobre-nos-image" src="/together/assests/images/Geral/img-sobre-nos.png"
                    alt="Imagem sobre nós">
            </div>
        </div>
        <div class="sobre-nos-cards-section">
            <div class="sobre-nos-cards-container">
                <div class="sobre-nos-card">
                    <h2>Introdução ao Projeto</h2>
                    <p>Bem-vindo ao nosso site, um espaço dedicado a conectar e promover ONGs de todo o país! Nossa
                        missão é
                        criar uma plataforma colaborativa que ajude organizações não governamentais a compartilhar seus
                        projetos, ampliar sua visibilidade e alcançar mais pessoas e parceiros que possam apoiar suas
                        causas.</p>
                </div>
                <div class="sobre-nos-card">
                    <h2>Nossa Missão</h2>
                    <p>Acreditamos no poder da união e na força das iniciativas sociais. Nosso objetivo é reunir as
                        melhores
                        práticas e ações de ONGs de diversos setores, dando visibilidade a seus projetos e tornando mais
                        fácil para voluntários, doadores e parceiros se envolverem com as causas que mais importam para
                        eles. Juntos, podemos fazer a diferença.</p>
                </div>
                <div class="sobre-nos-card">
                    <h2>Nossos Valores</h2>
                    <p><strong>Transparência:</strong> Acreditamos na importância da honestidade e clareza nas
                        informações,
                        tanto sobre as ONGs quanto seus projetos.</p>
                    <p><strong>Colaboração:</strong> Fomentamos a parceria entre organizações, voluntários, doadores e
                        qualquer pessoa interessada em causar um impacto positivo.</p>
                    <p><strong>Acessibilidade:</strong> Queremos que todos, independentemente de sua localização ou
                        condição, possam acessar e contribuir com iniciativas sociais.</p>
                </div>
                <div class="sobre-nos-card">
                    <h2>História do Projeto</h2>
                    <p>Nosso site foi idealizado com o objetivo de criar um ponto de encontro virtual para ONGs que
                        buscam
                        ampliar seu impacto. Ao longo do tempo, trabalhamos para conectar as organizações com as pessoas
                        certas, oferecendo uma plataforma simples, eficiente e de fácil acesso.</p>
                </div>
                <div class="sobre-nos-card">
                    <h2>O Que Nos Difere</h2>
                    <p>Diferente de outras plataformas, nosso site é exclusivo para ONGs, com um foco dedicado em seus
                        desafios e necessidades. Além disso, priorizamos a autenticidade, a diversidade de causas e a
                        inclusão, criando uma comunidade diversa e rica em soluções criativas para os problemas sociais.
                    </p>
                </div>
                <div class="sobre-nos-card">
                    <h2>Junte-se a Nós</h2>
                    <p>Queremos fazer parte da transformação social. Se você é uma ONG, um voluntário ou um doador,
                        convidamos você a se conectar conosco e fazer parte dessa rede de apoio. Explore os projetos
                        disponíveis, participe de ações ou ajude a divulgar a causa que mais lhe toca.</p>
                </div>
            </div>
            
        </div>
    </main>

    <?php require_once './components/footer.php' ?>
</body>