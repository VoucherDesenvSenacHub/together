<?php require_once "../../../view/components/head.php"; ?>
<?php require_once "../../../view/components/acoes.php"; ?>

<body>
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
                        <td>Saúde é vida</td>
                        <td>Aguardando</td>
                        <td>
                            <a href="\together\view\pages\Adm\validacaoAtualizacao.php">
                            <?= renderAcao('visualizar') ?>
                            </a>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>