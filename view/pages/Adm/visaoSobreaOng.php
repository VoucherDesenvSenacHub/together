<?php
require_once "../../../view/components/head.php";
?>

<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <div class="adm-ong-vision-container">
            <form method="post" action="#" class="adm-ong-vision-form-box">
                <div class="adm-ong-vision-area-limiter">
                    <div class="adm-ong-vision-filter-tags">
                        <h3>Fome Zero e Agricultura Sustentavel</h3>
                    </div>
                    <div class="adm-ong-vision-title-options">

                        <div class="adm-ong-vision-title-img-div">
                            <img class="adm-ong-vision-img" src="./../../assests/images/Adm/adm-vision-ong.png" alt="ong-img">
                        </div>
                        <div class="adm-ong-vision-title-div">
                            <strong class="adm-ong-vision-title">Associação Prato Cheio</strong>
                            <div>
                                <p>A Associação Prato Cheio combate a fome de pessoas em situação de vulnerabilidade social e promove sistemas alimentares sustentáveis.</p>
                            </div>
                            <div>
                                <input type="button" value="Fazer Doação">
                                <input type="button" value="Voluntariar-se">
                            </div>
                            <div>
                                <p>* Sua doação será feita diretamente para o Instituto Benfeitoria, que irá repassar os valores às organizações beneficiadas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="adm-ong-vision-about-location">
                        <h3>Campo Grande - MS R. Jardim Botânico 288</h3>
                    </div>
                    <div class="adm-ong-vision-about-div">
                        <p>
                            O trabalho da Associação Prato Cheio é voltado para atender pessoas em situação de vulnerabilidade social em São Paulo e região. A Prato Cheio acredita que a a redução das Perdas e Desperdício de Alimentos é essencial para combater a fome e a desnutrição e ao mesmo tempo ajudar a promover sistemas alimentares sustentáveis.
                        </p>

                        <p>
                            Em 21 anos de trabalho, já foram coletados e doados 4 milhões de kg de alimentos, que teriam sido desperdiçados, e que melhoram a alimentação de 25 mil pessoas diretamente. Em 1 dia de trabalho, a Prato Cheio coleta em média 2 mil kg de alimentos, equivalente a 4 mil refeições por dia - e tudo feito de forma gratuita! Menos desperdício de alimentos, mais saúde e sustentabilidade.
                        </p>

                        <p>
                            A Associação Prato Cheio atua em dois temas: redução da fome e desnutrição e redução do desperdício de alimentos.
                        </p>

                        <p>
                            A Prato Cheio desenvolve o Projeto Rota Solidária, coletando alimentos frescos que perderam valor comercial em diferentes locais (supermercados, indústrias, produtores), mas que mantém suas propriedades nutricionais preservadas, e doando para instituições sociais e no Projeto Oficinas Solidárias, oferencendo cursos e oficinas gratuitas sobre técnicas e receitas para redução do desperdício.
                        </p>
                    </div>
                    <div class="adm-ong-vision-post-container">
                        <div class="adm-ong-vision-post-title-div">
                            <h1 class="adm-ong-vision-title-text">Posagens da ONG</h1>
                        </div>
                        <div class="adm-ong-vision-post-box">
                            <div class="adm-ong-vision-post-area">

                                <?php for ($i = 0; $i < 12; $i++) { ?>
                                    <li class="adm-ong-vision-post-card">
                                        <p>A</p>
                                    </li>


                                <?php } ?>


                            </div>
                            <div class="adm-ong-vision-social-area">

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