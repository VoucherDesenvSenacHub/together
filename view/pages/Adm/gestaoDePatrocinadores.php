<?php require_once './../../components/head.php' ?>
<?php require_once './../../components/acoes.php' ?>
<?php require_once './../../components/button.php' ?>

<body>
    <header>
        <?php require_once './../../components/navbar.php' ?>

    </header>
    <main class="main-container">

        <div class="container-botao-patrocinadores">
            <?php require_once './../../components/back-button.php' ?>
            <?= botao('primary', 'Novo', 'modalPatrocinadores') ?>        </div>

        <table class="tabela">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++): ?>
                    <tr>
                        <td>
                            <img src="\together\view\assests\images\Adm\image.png" alt="" class="logo-patrocinador">
                        </td>
                        <td class="nome-patrocinador">Senac Hub Academy</td>
                        <td>
                            <div class="acoes-container">
                                <?= renderAcao('editar') ?>
                                <?= renderAcao('deletar') ?>
                            </div>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>

    </main>
    <?php require_once './../../components/footer.php' ?>

</body>

</html>