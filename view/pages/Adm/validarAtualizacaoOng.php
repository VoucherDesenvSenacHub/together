<?php
<<<<<<< HEAD
=======
// include __DIR__ . "\..\..\components\head.php";
>>>>>>> e77b384 (Iniciando atividade em php)
require_once "../../../view/components/head.php";

class DadosTabela
{
<<<<<<< HEAD
    private $dados = [
        ["Data" => '10/10/2024', "NomeOngs" => 'Esperança', "Status" => 'Aprovado'],
        ["Data" => '05/09/2024', "NomeOngs" => 'Vida', "Status" => 'Recusado'],
        ["Data" => '20/08/2024', "NomeOngs" => 'Amor', "Status" => 'Aguardando'],
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
                                        <button class="button-visualizar" type="button">
                                            <span class='material-symbols-outlined exibicao'> visibility </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
=======
    private $Data;
    private $NomeOngs;
    private $Status;
}

$arrays = [
    [$Data => 'XX/XX/XXXX'],
    [$NomeOngs => 'XXXXXXXXXXXXX'],
    [$Status => 'Aprovado'],
];

?>


<body>
    <?php
    require_once "../../../view/components/navbar.php";
    ?>
    <main>
        <section>
            <div class="titulo">
                <h1><?php echo "Cadastrais"; ?></h1>
            </div>
            <div>
                <table class="table-validar">
                    <thead>
                        <tr class="row-head">
                            <td>Data</td>
                            <td>Nome das Ongs</td>
                            <td>Status</td>
                            <td>Visualizar</td>
                        </tr>
                    </thead>
                    <tbody class="corpo-tabela">
                        <?php
                        foreach ($arrays as $array) { ?>
                            <? php ?>
                            <tr class="row-body">
                                <?php
                                echo "<td>$Data</td>";
                                echo "<td>$Ongs</td>";
                                echo "<td class='status-aguardando'>$Status</td>";
                                echo "<td><span class='material-symbols-outlined'> visibility </span></td>";
                        }
                        ?>
                        </tr>
                        <tr class="row-body">
                            <td>XX/XX/XXXX</td>
                            <td>XXXXXXXXXXXXX</td>
                            <td class="status-recusado">Recusado</td>
                            <td>
                                <span class="material-symbols-outlined"> visibility </span>
                            </td>
                        </tr>
                        <tr class="row-body">
                            <td>XX/XX/XXXX</td>
                            <td>XXXXXXXXXXXXX</td>
                            <td class="status-aprovado">Aprovado</td>
                            <td>
                                <span class="material-symbols-outlined"> visibility </span>
                            </td>
                        </tr>
                        <tr class="row-body">
                            <td>XX/XX/XXXX</td>
                            <td>XXXXXXXXXXXXX</td>
                            <td class="status-aguardando">Aguardando</td>
                            <td>
                                <span class="material-symbols-outlined"> visibility </span>
                            </td>
                        </tr>
>>>>>>> e77b384 (Iniciando atividade em php)
                    </tbody>
                </table>
            </div>
        </section>
    </main>
<<<<<<< HEAD
    <script src="../../../view/assests/js/pages/verOngUsuario.js" defer></script>
=======
    <script src="script.js" defer></script>
>>>>>>> e77b384 (Iniciando atividade em php)
</body>