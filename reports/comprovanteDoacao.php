<?php

require_once '../model/DoacaoModel.php';

$modelDoacao = new DoacaoModel();
$doacoes = $modelDoacao->BuscarDoacoesPorID(1);

var_dump($doacoes['dt_doacoes']);

$ong = [
    'nome' => 'ONG Legal',
    'cnpj' => 123331231,
    'endereco' => 'Senac Hub Academy'
];

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

        .flex
        {
            display: flex;
            justify-content: space-around;
        }

        .imagem
        {
            width: 200px;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="imagem">
            <img src="../view/assets/images/components/logo_nova_together.png" alt="together.png">
        </div>
        <h1 class="titulo">Comprovante de Doação</h1>
    
        <div class="flex">
            <p><strong>ID da Transação:</strong> <?= $doacoes['id'] ?></p>
            <p><strong>Data da Transação:</strong> <?= $doacoes['dt_doacao'] ?></p>
            <p><strong>Hora da Transação:</strong> <?= $doacoes['hora'] ?></p>
        </div>
        
        <hr>
        
        <p><strong>Nome do Doador:</strong> <?= $doacoes['id_usuario'] ?></p>
        <p><strong>Cartão:</strong> **** **** **** <?= $doacoes['ultimos_digitos'] ?></p>
        <p><strong>Valor pago:</strong> R$ <?= $doacoes['valor'] ?></p>
    
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