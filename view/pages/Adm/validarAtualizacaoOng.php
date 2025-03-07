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

<body>
    <?php require_once "../../../view/components/navbar.php"; ?>
    
    <main>
        <section>
            <div class="titulo">
                <h1>Cadastrais</h1>
            </div>
            <div>
                <table class="table-validar">
                    <thead>
                        <tr class="row-head">
                            <th>Data</th>
                            <th>Nome das Ongs</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody class="corpo-tabela">
                        <?php foreach ($arrays as $array) { ?>
                            <tr class="row-body">
                                <td><?php echo $array["Data"]; ?></td>
                                <td><?php echo $array["NomeOngs"]; ?></td>
                                <td class="status-aprovado"><?php echo $array["Status"] ?></td>
                                <td><span class='material-symbols-outlined'> visibility </span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="script.js" defer></script>
</body>
