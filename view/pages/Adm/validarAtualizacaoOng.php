<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>


<body class="validar-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="titulo-pagina-tabela">
            <h1>Validação de ONGs</h1>
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
                        <td>ONG Cachorrinho</td>
                        <td>Aguardando</td>
                        <td>
                            <?= renderAcao('visualizar') ?>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </main>

<div class="modal-overlay" id="modal-overlay-validar-ong">
    <div class="modal">
        <div class="conteudo-modal-validar">
            <h2>Detalhes da ONG</h2>
            <p><strong>Nome:</strong> ONG Cachorrinho</p>
            <p><strong>Data da solicitação:</strong> xx/xx/xxxx</p>
            <p><strong>Status:</strong> Aguardando</p>
            <p><strong>Descrição:</strong> Uma ONG destinada a ajudar cachorrinhos</p>
        </div>
        
        <!-- Mensagem de Status -->
        <div id="mensagem-status" class="mensagem-status"></div>

        <div class="botao-modal-validar">
            <button class="btn primary" id="aceitar-ong">Aceitar</button>
            <button class="btn danger" id="rejeitar-ong">Rejeitar</button>
            <button class="btn primary" id="fechar-modal-ong">Fechar</button>
        </div>
    </div>
</div>


        <?php require_once "../../../view/components/footer.php"; ?>
    </body>
</html>
