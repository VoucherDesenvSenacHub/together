<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validação de Voluntários</h1>
            <div class="formulario-perfil">
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
                        <?php $lista = ["Ana Clara", "Bruno Silva", "Carlos Eduardo", "Daniela Souza", "Eduardo Lima", "Fernanda Alves", "Gabriel Rocha", "Helena Costa", "Isabela Martins", "João Pedro"]; ?>
                        <?php for ($i = 0; $i < 10; $i++): ?>
                            <tr>
                                <td><?= $i + 10 ?>/05/2025</td>
                                <td><?= $lista[$i] ?></td>
                                <td>Aguardando</td>
                                <td>
                                    <a href="/together/view/pages/Ong/visualizarVoluntarios.php">
                                        <?= renderAcao('visualizar') ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>