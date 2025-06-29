<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>

<body class="voluntario-ong">
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Voluntários da ONG</h1>
            <div class="formulario-perfil">
                <div class="table-mobile">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome do voluntário</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $lista = ["Ana Clara", "Bruno Silva", "Carlos Eduardo", "Daniela Souza", "Eduardo Lima", "Fernanda Alves", "Gabriel Rocha", "Helena Costa", "Isabela Martins", "João Pedro"]; ?>
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td><?= $i + 10 ?>/05/2025</td>
                                    <td><?= $lista[$i] ?></td>
                                    <td>
                                        <a href="/together/view/pages/Ong/visualizarVoluntarioCadastrado.php">
                                            <?= renderAcao('visualizar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>