<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/label.php' ?>
<?php require_once './../../components/input.php' ?>
<?php require_once './../../components/acoes.php' ?>


<body>
    <?php require_once './../../components/navbar.php' ?>
    <main class="main-container">
        <?php require_once './../../components/back-button.php' ?>

    <h1 class="titulo-pagina-tabela">Validar Ongs</h1>

        <form action="" class="">
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
                    <th>Data de Envio</th>
                    <th>Nome das ONGs</th>
                    <th>Status</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody class="body-table">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <td class="row-body-table">XX/XX/XXXX</td>
                    <td class="row-body-table">Habitat Brasil</td>
                    <td>Pendente</td>
                    <td>
                        <?= renderAcao('visualizar') ?>
                    </td>
                    
                </tr>
                <tr>
                    <td class="row-body-table">XX/XX/XXXX</td>
                    <td class="row-body-table">WWF-Brasil</td>
                    <td>Aprovado</td>
                    <td>
                        <?= renderAcao('visualizar') ?>
                    </td>
                    
                </tr>
                <tr>
                    <td class="row-body-table">XX/XX/XXXX</td>
                    <td class="row-body-table">Mata-Atlantica-SOS</td>
                    <td>Recusado</td>
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