<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/acoes.php"; ?>

<body class="validar-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="titulo-pagina-tabela">
            <h1>Atualização Cadastral</h1>
        </div>


        <table class="tabela">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome das Ongs</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>xx/xx/xxxx</td>
                        <td>Vida Pet</td>
                        <td>Aguardando</td>
                        <td>
                            <?= renderAcao('visualizar') ?>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

    <main class="main-container">
        <h3 class="title-atualizar-ong">Validação de ONGs</h3>

        <section class="tabela-validacao">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome da ONG</th>
                        <th>Status</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-cnpj="12.345.678/0001-90" 
                        data-fundacao="10/03/2010"
                        data-telefone="(11) 99999-9999"
                        data-endereco="Rua Exemplo, 123"
                        data-conselho="Sim"
                        data-tipo="Ambiental"
                        data-logo="/caminho/para/logo.png"
                        data-email="email@ongcachorrinho.org">
                        <td>30/04/2025</td>
                        <td>ONG Cachorrinho</td>
                        <td><i class="fas fa-hourglass-half" title="Aguardando"></i></td> 
                        <td><a href="#"><i class="fas fa-eye"></i></a></td> 
                    </tr>
                    <!-- Repetir a estrutura de tr para outras ONGs -->
                </tbody>
            </table>
        </section>
    </main>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3>Detalhes da ONG</h3>
            <div class="modal-info-grid" id="modal-info">
            <!-- conteúdo preenchido via JS -->
            </div>
            <div class="modal-buttons">
                <button id="aceitar-btn" class="accept-btn">Aceitar</button>
                <button id="rejeitar-btn" class="reject-btn">Rejeitar</button>
            </div>
        </div>
    </div>

    <?php require_once "../../../view/components/footer.php"; ?>

</body>
</html>
