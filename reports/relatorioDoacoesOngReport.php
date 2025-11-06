<?php

require_once __DIR__ . '/../model/RelatorioModel.php';

global $idOng;
$relatorioModel = new RelatorioModel();
$doacoes = $relatorioModel->buscarDoacoesOng(1);
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = getDate();


 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        *
        {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 16px;
        }

        .container
        {
            padding: 2rem;
        }

        table
        {
            width: 100%;
        }

        td 
        {
            padding: 4px;
            font-size: 16px;
        }



        .imagem img {
            width: 200px;
            display: block;
        }

        .titulo
        {
            text-align: center;
            font-size: 20px;
            margin-bottom: 2rem;
        }

        .aviso p
        {
            text-align: center;
            font-weight: lighter;
            color: grey;
        }

        img
        {
            width: 200px;

        }

        hr
        {
            margin: 2rem 0 2rem 0;
        }

        p
        {
            margin: 0.2rem 0 0.2rem 0;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Doacoes recebidas pela <?=$doacoes[0]['razao_social']?></h1>
        <?php foreach($doacoes as $doacao){
            $doacao['hora'] = date('H:i:s', strtotime($doacao['dt_doacao']));
            $doacao['dt_doacao'] = date('d/m/Y', strtotime($doacao['dt_doacao'])); 
        ?>
        <table>
            <tr>
                <td><strong>Data da doação:</strong> <?= $doacao['dt_doacao'] ?></td>
                <td><strong>Doador:</strong> <?= $doacao['nome'] ?></td>
                <td><strong>Valor:</strong> <?= number_format($doacao['valor'],2, ',', '.') ?></td>
            </tr>
        </table>

        
        <hr>

        <?php } ?>

        <div class="aviso">
            <p>Data do relatório: <?=date("d/m/Y")?></p>
        </div>
    </div>
</body>
</html>