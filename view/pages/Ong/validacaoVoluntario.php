<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validação de Voluntários</h1>
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Voluntário</th>
                        <th>Status</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12/03/2024</td>
                        <td>João Silva</td>
                        <td>Aguardando</td>
                        <td>
                            <?= renderAcao('visualizar') ?>
                        </td>
                    </tr>
                    <tr>
                        <td>12/03/2024</td>
                        <td>João Silva</td>
                        <td>Aguardando</td>
                        <td>
                            <?= renderAcao('visualizar') ?>
                        </td>
                    </tr>
                    <?php for ($i = 0; $i < 10; $i++): ?>
                        <tr>
                            <td>12/03/2024</td>
                            <td>João Silva</td>
                            <td>Aguardando</td>
                            <td>
                                <?= renderAcao('visualizar') ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>