<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>

<body class="voluntario-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="titulo-pagina-tabela">
            <h1>Voluntarios da ONG</h1>
        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome do voluntário</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>01/01/2025</td>
                        <td>Jhon F. Kennedy</td>
                        <td>Aguardando</td>
                        <td>
                            <a href="\together\view\pages\\Ong\visualizarVoluntarios.php">
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
