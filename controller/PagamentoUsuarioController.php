<?php
session_start();

require_once __DIR__ . "/../exceptions/PagamentoException.php";
require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../model/UsuarioModel.php";
require_once __DIR__ . "/../model/DoacaoModel.php";

try {
    $logadont = !isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['perfil']) || empty($_SESSION['perfil']);

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método inválido para esta requisição.");
    }

    if ($logadont) {
        throw new Exception("Usuário não autenticado. Faça login para continuar.");
    }

    $validator = new PagamentoException();
    $validator->validar($_POST);

    // Verifica validade do cartão
    if (!preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/", $_POST['validade'], $matches)) {
        throw new Exception("Data de validade do cartão inválida.");
    }

    $mes = (string)$matches[1];
    $ano = (string)($matches[2] + 2000);

    // Buscar dados do usuário
    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->findUsuarioById($_SESSION['id']);

    // Montar dados para a API
    $data = [
        "titular" => [
            "nome" => $usuario['nome'],
            "cpfCnpj" => $usuario['cpf'],
            "email" => $usuario['email'],
            "cep" => $usuario['cep'],
            "enderecoNumero" => (string)$usuario['numero'],
            "enderecoComplemento" => $usuario['complemento'],
            "telefone" => preg_replace('/[^\d]/', '', $usuario['telefone'])
        ],
        "cartao" => [
            "numero" => $_POST['numero'],
            "nome" => $_POST['nome'],
            "expiracaoMes" => $mes,
            "expiracaoAno" => $ano,
            "cvv" => $_POST['cvv']
        ],
        "produto" => [
            "descricao" => "Doação para ONG",
            "valor" => (float)$_POST['valor'],
        ]
    ];

    // Enviar requisição para a API com cURL
    $url = 'http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card';

    $dataJson = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Accept: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

    $response = curl_exec($ch);

    // Captura erro de conexão
    if ($response === false) {
        $erroCurl = curl_error($ch);
        curl_close($ch);
        throw new Exception("Erro ao se conectar com a API de pagamento: $erroCurl");
    }

    // Captura código de resposta HTTP
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Decodifica resposta
    $respostaApi = json_decode($response, true);

    // Para depuração (log de resposta da API)
    //file_put_contents(__DIR__ . "/../log_api_pagamento.txt", date('Y-m-d H:i:s') . "\nHTTP: $httpCode\nResposta: $response\n\n", FILE_APPEND);

    $statusPagamento = ($httpCode === 200) ? 'Aprovado' : 'Recusado';

    $ultimosDigitos = str_pad(substr($_POST['numero'], -4), 4, '*', STR_PAD_LEFT);

    $dadosPagamento = [
        $_SESSION['id'],
        $_POST['idOng'],
        (float)$_POST['valor'],
        isset($_POST['pagamento_anonimo']) ? true : false,
        'Cartão de Crédito',
        $statusPagamento,
        'Doação via cartão de crédito',
        $_POST['nome'],
        'Doação para ONG ' . $_POST['idOng'],
        $ultimosDigitos,
        '' // comprovante, se tiver
    ];

    // Salva no banco
    $doacaoModel = new DoacaoModel();
    $doacaoModel->SalvarDoacao(...$dadosPagamento);

    $_SESSION['type'] = 'success';
    $_SESSION['message'] = 'Pagamento realizado com sucesso! Obrigado por sua doação.';

    // echo "<pre>";
    // print_r($dataJson);
    // print_r($response);
    // print_r($httpCode);
    // print_r($respostaApi);
    // print_r($_SESSION);
    // echo "</pre>";
    header("Location: ../index.php");
    exit();

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['erro'] = $e->getMessage();

    if ($logadont) {
        header('Location: ../view/pages/login.php');
    } else if (isset($_POST['idOng'])) {
        header('Location: ../view/pages/Usuario/pagamentoUsuario.php?idOng=' . $_POST['idOng']);
    } else {
        header('Location: ../index.php');
    }
    exit();
}
