<?php
require_once "../../../view/components/head.php";
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <div class="adm-ong-vision-container">

            <form method="post" action="#" class="adm-ong-vision-form-box">
                <div class="adm-ong-vision-back-button-div">
                    <?php require_once './../../components/back-button.php' ?>
                </div>
                <div class="adm-ong-vision-area-limiter">
                    <div class="adm-ong-vision-filter-tags">
                        <i id="adm-ong-vision-icon-default" class="fa-solid fa-tag fa-rotate-90"></i>
                        <h3 id="adm-ong-vision-filter-tag-title" class="adm-ong-vision-default-text">Fome Zero e Agricultura Sustentavel</h3>
                    </div>
                    <div class="adm-ong-vision-title-options">

                        <div class="adm-ong-vision-title-img-div">
                            <img class="adm-ong-vision-img" src="./../../assests/images/Adm/adm-vision-ong.png" alt="ong-img">
                        </div>
                        <div class="adm-ong-vision-title-div">
                            <strong class="adm-ong-vision-title">Associação Prato Cheio</strong>
                            <div class="adm-ong-vision-subtitle">
                                <p id="adm-ong-vision-title-description" class="adm-ong-vision-default-text">A Associação Prato Cheio combate a fome de pessoas em situação de vulnerabilidade social e promove sistemas alimentares sustentáveis.</p>
                            </div>
                            <div class="adm-ong-vision-button-div">
                                <input class="adm-ong-vision-default-button" type="button" value="Fazer Doação">
                                <input class="adm-ong-vision-default-button" type="button" value="Voluntariar-se">
                            </div>
                            <div>
                                <p id="adm-ong-vision-text-alert" class="adm-ong-vision-default-text"><i>* Sua doação será feita diretamente para o Instituto Benfeitoria, que irá repassar os valores às organizações beneficiadas.</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="adm-ong-vision-about-location-div">
                        <i id="adm-ong-vision-icon-default" class="fa-solid fa-location-dot"></i>
                        <h3 id="adm-ong-vision-about-location-title" class="adm-ong-vision-default-text">Campo Grande - MS R. Jardim Botânico 288</h3>
                    </div>
                    <div class="adm-ong-vision-about-div">
                        <p class="adm-ong-vision-default-text">
                            O trabalho da Associação Prato Cheio é voltado para atender pessoas em situação de vulnerabilidade social em São Paulo e região. A Prato Cheio acredita que a a redução das Perdas e Desperdício de Alimentos é essencial para combater a fome e a desnutrição e ao mesmo tempo ajudar a promover sistemas alimentares sustentáveis.
                        </p>

                        <p class="adm-ong-vision-default-text">
                            Em 21 anos de trabalho, já foram coletados e doados 4 milhões de kg de alimentos, que teriam sido desperdiçados, e que melhoram a alimentação de 25 mil pessoas diretamente. Em 1 dia de trabalho, a Prato Cheio coleta em média 2 mil kg de alimentos, equivalente a 4 mil refeições por dia - e tudo feito de forma gratuita! Menos desperdício de alimentos, mais saúde e sustentabilidade.
                        </p>

                        <p class="adm-ong-vision-default-text">
                            A Associação Prato Cheio atua em dois temas: redução da fome e desnutrição e redução do desperdício de alimentos.
                        </p>

                        <p class="adm-ong-vision-default-text">
                            A Prato Cheio desenvolve o Projeto Rota Solidária, coletando alimentos frescos que perderam valor comercial em diferentes locais (supermercados, indústrias, produtores), mas que mantém suas propriedades nutricionais preservadas, e doando para instituições sociais e no Projeto Oficinas Solidárias, oferencendo cursos e oficinas gratuitas sobre técnicas e receitas para redução do desperdício.
                        </p>
                    </div>
                    <div class="adm-ong-vision-post-container">
                        <div class="adm-ong-vision-post-title-div">
                            <h1 class="adm-ong-vision-title-text">Postagens da ONG</h1>
                        </div>
                        <div class="adm-ong-vision-post-box">
                            <div class="adm-ong-vision-post-area">

                                <?php for ($i = 0; $i < 5; $i++) { ?>

                                    <li class="adm-ong-vision-post-card">
                                        <div class="adm-ong-vision-post-img-moldure">
                                            <img class="adm-ong-vision-post-img" src="./../../assests/images/Adm/adm-vision-ong-post1.png" alt="">
                                        </div>
                                        <div class="adm-ong-vision-post-text-div">
                                            <h1>Instagram</h1>
                                            <p>https://www.instagram.com > PratoCheio</p>
                                            <h3><a href="https://www.instagram.com/ongmissaoafrica/p/CsHzIbtPSp8/?img_index=1">Compartilhando Alimento, Nutrindo Esperança: Sua Doação Faz a Diferença na Vida dos Moradores de Rua</a></h3>
                                        </div>
                                    </li>

                                    <?php
                                    if ($i < 4) {
                                        echo "<hr>";
                                    } else {
                                        echo "";
                                    }

                                    ?>

                                <?php } ?>

                            </div>
                            <div class="adm-ong-vision-social-area">
                                <div class="adm-ong-vision-social-title">
                                    <h1>Nossas Redes Sociais</h1>
                                </div>

                                <div class="adm-ong-vision-perfil-area">
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon" src="./../../assests/images/Adm/skill-icons_instagram.png" alt="">
                                        <h1>/PratoCheioOfc</h1>
                                    </div>
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon" src="./../../assests/images/Adm/devicon_facebook.png" alt="">
                                        <h1>@PratoCheio_Ms</h1>
                                    </div>
                                    <div class="adm-ong-vision-area-div-perfil">
                                        <img class="adm-ong-vision-perfil-default-icon" src="./../../assests/images/Adm/skill-icons_twitter.png" alt="">
                                        <h1>@PratoCheioOfc</h1>
                                    </div>
                                </div>

                                <div class="adm-ong-vision-social-text">
                                    <p>Acompanhe as ações do Prato Cheio e fique por dentro das principais notícias sobre a luta contra a fome e a promoção da solidariedade em sua comunidade.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>