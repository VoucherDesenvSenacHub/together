<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>


<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

        <div class="div-wrap-width">
            <form action="" class="form-filtro-data">
                <div class="superior-pagina-tabela">
                    <h1 class="titulo-pagina">Usuários Cadastrados</h1>
                    <div class="filtro-por-mes">
                        <?= label('periodo', 'Período') ?>
                        <div class="input-filtro-por-mes">
                            <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                            <?= inputFilter('date', 'data-final', 'data-final') ?>
                        </div>
                    </div>
                </div>
            </form>
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Data de Cadastro</th>
                        <th>Nome do Perfil</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++): ?>
                        <tr>
                            <td>15/03/1986</td>
                            <td>Kauan Pereira</td>
                            <td>
                                <a href="visaoDoUsuario.php">
                                    <?= renderAcao('visualizar') ?>
                                </a>
                            </td>
                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>

    </main>
    
    <?php require_once './../../components/footer.php' ?>
</body>