<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/label.php' ?>


<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <div class="titulo-pagina">
                <h1>Validação de ONGs</h1>
            </div>
            <div class="formulario-perfil">
                <div class="table-mobile">
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
                            <?php $lista = ["Médicos Sem Fronteiras","Greenpeace","Amnesty International","WWF","Aldeias Infantis SOS","Cruz Vermelha","Instituto Ayrton Senna","Projeto Tamar","Fundação Abrinq","GRAACC"] ?>
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td><?php echo $i + 10 ?>/09/2025</td>
                                    <td><?php echo $lista[$i]?></td>
                                    <td>Aguardando</td>
                                    <td>
                                        <a href="validarCadastroOng.php">
                                            <?= renderAcao('visualizar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>

    </main>

    <?php require_once "../../../view/components/footer.php"; ?>
</body>

</html>