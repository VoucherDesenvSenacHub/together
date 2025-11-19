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

    if (!preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/", $_POST['validade'], $matches)) {
        throw new Exception("Data de validade do cartão inválida.");
    }

    $mes = (string)$matches[1];
    $ano = (string)($matches[2] + 2000);

    $usuarioModel = new UsuarioModel();
    $usuario = $usuarioModel->findUsuarioById($_SESSION['id']);

    if( empty($usuario['cep']) || empty($usuario['numero']) ||
        empty($usuario['telefone']) || empty($usuario['complemento']) )
    {
        throw new Exception("Informações insuficientes do usuário.");
    }

    if(strlen($usuario['telefone']) == 10) {
        $usuario['telefone'] = preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '${1}9$2$3', $usuario['telefone']);
    }

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
            "descricao" => "Doação para ONG " . $_POST['idOng'],
            "valor" => floatval($_POST['valor']),
        ]
    ];

    $url = 'http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card';

    $dataJson = json_encode($data, JSON_UNESCAPED_UNICODE);

    if ($dataJson === false || json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Erro ao gerar JSON: " . json_last_error_msg());
    }


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json; charset=utf-8',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

    $response = curl_exec($ch);

    if ($response === false) {
        $erroCurl = curl_error($ch);
        curl_close($ch);
        throw new Exception("Erro ao se conectar com a API de pagamento: $erroCurl");
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $respostaApi = json_decode($response, true);

    if ($httpCode !== 200) {
        throw new Exception("Erro na API de pagamento. Erro: $respostaApi[detail]");
    }


    if($respostaApi === null) {
        throw new Exception("Resposta inválida da API de pagamento.");
    }

    $ultimosDigitos = str_pad(substr($_POST['numero'], -4), 4, '*', STR_PAD_LEFT);

    $dadosPagamento = [
        $_SESSION['id'],
        $_POST['idOng'],
        $respostaApi['valor'],
        isset($_POST['pagamento_anonimo']) ? true : false,
        $respostaApi['tipo'],
        $respostaApi['situacao'],
        $respostaApi['descricao'],
        $respostaApi['id'],
        $respostaApi['cartao']['bandeira'],
        $ultimosDigitos
    ];

    
    $doacaoModel = new DoacaoModel();
    $sucesso = $doacaoModel->SalvarDoacao(...$dadosPagamento);
    if (!$sucesso) {
        throw new Exception("Falha ao registrar a doação no sistema. Por favor, tente novamente.");
    }

    $_SESSION['type'] = 'sucesso';
    $_SESSION['message'] = 'Pagamento realizado com sucesso! Obrigado por sua doação.';

    
    header("Location: ../view/pages/Usuario/historicoDoacao.php");
    exit();

} catch (Exception $e) {
    $_SESSION['type'] = 'erro';
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['erro'] = $e->getMessage();

    if ($logadont) {
        header('Location: ../view/pages/login.php');
    } else if (isset($_POST['idOng'])) {
        header('Location: ../view/pages/usuario/pagamentoUsuario.php?idOng=' . $_POST['idOng']);
    } else {
        header('Location: ../index.php');
    }
    exit();
}
