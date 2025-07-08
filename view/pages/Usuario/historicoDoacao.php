<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Histórico de Doações</h1>
            <div class="formulario-perfil">
                <div class="table-mobile">
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
                            <?php $lista = ["Médicos Sem Fronteiras","Greenpeace","Amnesty International","WWF","Aldeias Infantis SOS","Cruz Vermelha","Instituto Ayrton Senna","Projeto Tamar","Fundação Abrinq","GRAACC"] ?>
                            <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr>
                                    <td><?=  $i+10?>/8/2025</td>
                                    <td><?=  $lista[$i]?></td>
                                    <td><?=  "R$" . ($i+4)*10 ?></td>
                                    <td>
                                        <a href="assests/images/usuario/historicoDoacoes.jpg" download style="color: #797777;">
                                            <?= renderAcao('baixar') ?>
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
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>