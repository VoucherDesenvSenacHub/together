<?php require_once "./../../components/head.php"; ?>
<?php require_once "./../../components/acoes.php"; ?>
<?php require_once "./../../components/label.php"; ?>
<?php require_once "./../../components/input.php"; ?>
<?php require_once "./../../../model/DoacaoModel.php"; ?>

<?php $doacaoModel = new DoacaoModel(); 
$doacoes = $doacaoModel->BuscarDoacoesPorID(1);
?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>
        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Histórico de Doações</h1>
            <div class="formulario-perfil">
                <div class="filtro">
                        <div class="bloco-datas">
                            <div class="filtro-por-mes">
                                <?= label('data-inicio', 'Período') ?>
                                <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= inputFilter('date', 'data-final', 'data-final') ?>
                            </div>
                            <div class="filtro-por-mes">
                                <?= label('data-final', '&nbsp;') ?>
                                <?= botao('primary', '✔') ?>
                            </div>
                        </div>

                        <div class="bloco-pesquisa">
                            <?= label('pesquisar', '&nbsp;') ?>
                            <?= inputFilter('text', 'pesquisar', 'pesquisar', "Pesquisar Ong&#39s") ?>
                        </div>
                    </div>
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
                            <?php foreach ($doacoes as $doacao){ ?>
                                <tr>
                                    <td><?= $doacao['dt_doacao'] ?></td>
                                    <td><?= $doacao['razao_social']?></td>
                                    <td><?=  "R$" . $doacao['valor'] ?></td>
                                    <td>
                                        <a href="assests/images/usuario/historicoDoacoes.jpg" download style="color: #797777;">
                                            <?= renderAcao('baixar') ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
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