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

    // Verifica se validade do cartão é válida
    if (!preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/", $_POST['validade'], $matches)) {
        throw new Exception("Data de validade do cartão inválida.");
    }

    $mes = (int)$matches[1];
    $ano = (int)$matches[2] + 2000;

    // Buscar dados do usuário
    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->findUsuarioById($_SESSION['id']);

    // Montar dados para requisição à API de pagamento
    $data = [
        "titular" => [
            "nome" => $usuario['nome'],
            "cpfCnpj" => $usuario['cpf'],
            "email" => $usuario['email'],
            "cep" => $usuario['cep'],
            "enderecoNumero" => $usuario['numero'],
            "enderecoComplemento" => $usuario['complemento'],
            "telefone" => $usuario['telefone']
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

    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents('http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card', false, $context);

    $httpCode = null;
    if (isset($http_response_header[0])) {
        preg_match('{HTTP/\S*\s(\d{3})}', $http_response_header[0], $match);
        $httpCode = isset($match[1]) ? (int)$match[1] : null;
    }

    $respostaApi = json_decode($response, true);

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
        ''
    ];

    // Salva no banco
    $doacaoModel = new DoacaoModel();
    $doacaoModel->SalvarDoacao(...$dadosPagamento);

    $_SESSION['type'] = 'success';
    $_SESSION['message'] = 'Pagamento realizado com sucesso! Obrigado por sua doação.';


    echo $httpCode;
    echo $response;
    // header("Location: ../index.php");
    // exit();

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
