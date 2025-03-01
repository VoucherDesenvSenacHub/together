<?php
// include __DIR__ . "\..\..\components\head.php";
require_once "../../../view/components/head.php";

class DadosTabela
{
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
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="script.js" defer></script>
</body>