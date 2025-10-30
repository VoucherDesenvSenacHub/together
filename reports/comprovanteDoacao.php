<?php

require_once '../utils/PdfUtil.php';

$id = 5;

$modelDoacao = new PdfUtil();
$doacoes = $modelDoacao->procurarHistoricoDoacao($id);

$ong = [
    'nome' => 'ONG Legal',
    'cnpj' => 123331231,
    'endereco' => 'Senac Hub Academy'
];

$doacoes[0]['hora'] = date('H:i:s', strtotime($doacoes[0]['dt_doacao']));
$doacoes[0]['dt_doacao'] = date('d/m/Y', strtotime($doacoes[0]['dt_doacao']));
 
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
        <div class="imagem">
            <img src="../view/assets/images/components/logo_nova_together.png" alt="together.png">
        </div>
        <h1 class="titulo">Comprovante de Doação</h1>
    
        <table>
            <tr>
                <td><strong>ID da Transação:</strong> <?= $doacoes[0]['codigo_transacao'] ?></td>
                <td><strong>Data da Transação:</strong> <?= $doacoes[0]['dt_doacao'] ?></td>
                <td><strong>Hora da Transação:</strong> <?= $doacoes[0]['hora'] ?></td>
            </tr>
        </table>

        
        <hr>
        
        <p><strong>Nome do Doador:</strong> <?= $doacoes[0]['nome'] ?></p>
        <p><strong>Cartão:</strong> **** **** **** <?= $doacoes[0]['ultimos_digitos'] ?></p>
        <p><strong>Valor pago:</strong> R$ <?= $doacoes[0]['valor'] ?></p>
    
        <hr>

        <p><strong>ONG:</strong> <?= $ong['nome'] ?></p>
        <p><strong>CNPJ:</strong> <?= $ong['cnpj'] ?></p>
        <p><strong>Endereço:</strong> <?= $ong['endereco'] ?></p>

        <hr>

        <div class="aviso">
            <p>Esse é um comprovante gerado automaticamente. Guarde-o para referêcia futura.</p>
        </div>
    </div>
</body>
</html>