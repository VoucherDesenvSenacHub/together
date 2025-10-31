<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once "../../components/alert.php";

if (isset($_SESSION['type'], $_SESSION['message'])) {
    showPopup($_SESSION['type'], $_SESSION['message']);
    unset($_SESSION['type'], $_SESSION['message']);
}
?>

<body>
    <?php require_once "./../../components/navbar.php"; ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <h1 class="titulo-pagina">Validação de Voluntários</h1>
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
                        <?= inputFilter('text', 'pesquisar', 'pesquisar', 'Pesquisar Voluntário') ?>
                    </div>
                </div>

                <div class="table-mobile">
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
                <?php require_once './../../components/paginacao.php' ?>
            </div>
        </div>
    </main>
    <?php require_once "./../../components/footer.php"; ?>
</body>

</html>