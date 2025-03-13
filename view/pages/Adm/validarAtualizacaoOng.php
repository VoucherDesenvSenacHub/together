<?php
require_once "../../../view/components/head.php";
?>

<body class="body-page-validarong">
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main>
        <section>
            <div>
                <h1 class="title-page-validarong">Atualização Cadastral</h1>
            </div>
            <div>
                <table class="table-validation">
                    <thead>
                        <tr class="row-head">
                            <th>Data</th>
                            <th>Nome das Ongs</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody class="body-table">
                        <tr>
                            <td class="row-body-table">xx/xx/xxxx</td>
                            <td class="row-body-table">Vida pet</td>
                            <td class="status-aguardando">aguardando/td>
                            <td>
                                <form action="" method="get">
                                    <button class="buttom-visibility-ong-status">
                                        <span class='material-symbols-outlined exibicao-visualizarong'> visibility
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php require_once "../../../view/components/footer.php"; ?>
</body>