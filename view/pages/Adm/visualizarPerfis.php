<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>


<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">

    <h1 class="titulo-pagina-tabela">Ongs e Usuários Cadastrados</h1>

        <form action="" class="form-filtro-data">
            <div class="filtro-por-mes">
                <?= label('periodo', 'Período') ?>
                <div class="input-filtro-por-mes">
                    <?= inputFilter('date', 'data-inicio', 'data-inicio') ?>
                    <?=  inputFilter('date', 'data-final', 'data-final') ?>
                </div>
            </div>
        </form>

        <table class="tabela">
            <thead>
                <tr class="row-head">
                    <th>Data de Cadastro</th>
                    <th>Nome dos Perfis</th>
                    <th>Tipo de Perfil</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody class="body-table">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <tr>
                    <td class="row-body-table">XX/XX/XXXX</td>
                    <td class="row-body-table">Saúde é Vida</td>
                    <td>Ong</td>
                    <td>
                        <?= renderAcao('visualizar') ?>
                    </td>
                </tr>
            <?php endfor ?>
            </tbody>
        </table>
    </main>
    <?php require_once './../../components/footer.php' ?>
</body>