<?php

require_once __DIR__ . '/../model/RelatorioModel.php';

global $idCodigoTransacao;

$relatorioModel = new RelatorioModel();
$doacao = $relatorioModel->buscarDoacao($idCodigoTransacao);

$doacao['hora'] = date('H:i:s', strtotime($doacao['dt_doacao']));
$doacao['dt_doacao'] = date('d/m/Y', strtotime($doacao['dt_doacao']));
 
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
        <h1 class="titulo">Comprovante de Doação</h1>
    
        <table>
            <tr>
                <td><strong>ID da Transação:</strong> <?= $doacao['codigo_transacao'] ?></td>
                <td><strong>Data da Transação:</strong> <?= $doacao['dt_doacao'] ?></td>
                <td><strong>Hora da Transação:</strong> <?= $doacao['hora'] ?></td>
            </tr>
        </table>

        
        <hr>
        
        <p><strong>Nome do Doador:</strong> <?= $doacao['nome'] ?></p>
        <p><strong>Cartão:</strong> **** **** **** <?= $doacao['ultimos_digitos'] ?></p>
        <p><strong>Valor pago:</strong> R$ <?= $doacao['valor'] ?></p>
    
        <hr>

        <p><strong>ONG:</strong> <?= $doacao['razao_social'] ?></p>
        <p><strong>CNPJ:</strong> <?= $doacao['cnpj'] ?></p>
        <p><strong>Telefone:</strong> <?= $doacao['telefone'] ?></p>

        <hr>

        <div class="aviso">
            <p>Esse é um comprovante gerado automaticamente. Guarde-o para referêcia futura.</p>
        </div>
    </div>
</body>
</html>