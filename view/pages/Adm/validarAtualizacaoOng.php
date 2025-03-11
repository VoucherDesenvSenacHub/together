<?php
require_once "../../../view/components/head.php";

class DadosTabela
{
    private $dados = [
        ["Data" => '10/10/2024', "NomeOngs" => 'Ong Esperança', "Status" => 'Aprovado'],
        ["Data" => '05/09/2024', "NomeOngs" => 'Ong Vida', "Status" => 'Recusado'],
        ["Data" => '20/08/2024', "NomeOngs" => 'Ong Amor', "Status" => 'Aguardando'],
    ];

    public function getDados()
    {
        return $this->dados;
    }
}

$tabela = new DadosTabela();
$arrays = $tabela->getDados();
?>


<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>

    <main>
        <section>
            <div class="title-h1">
                <h1>Atualização Cadastral</h1>
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
                        <?php foreach ($arrays as $array) { ?>
                            <tr class="row-body">
                                <td><?php echo $array["Data"]; ?></td>
                                <td><?php echo $array["NomeOngs"]; ?></td>
                                <td class="status-aguardando"><?php echo $array["Status"] ?></td>
                                <td>
                                    <form action="" method="get">
                                        <button>
                                            <span class='material-symbols-outlined exibicao'> visibility </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="../../../view/assests/js/pages/verOngUsuario.js" defer></script>
</body>