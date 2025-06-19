<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        <div class="titulo-pagina">
            <h1>Historico de Doações</h1>
        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>ONGS</th>
                    <th>Doações</th>
                    <th>Comprovante</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>xx/xx/xxxx</td>
                        <td>xxxxxxxxx</td>
                        <td>xxxxxxxxx</td>
                        <td>
                            <?= renderAcao('baixar') ?>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>