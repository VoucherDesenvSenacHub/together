<?php
session_start();
require_once __DIR__ . "/../model/validators/pagamentoValidator.php";
require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../model/UsuarioModel.php";


try {
    $logadont = !isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['perfil']) || empty($_SESSION['perfil']);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {


        $validator = new pagamentoValidator();
        $validator->validar($_POST);

        
        if($logadont) {
            throw new Exception("Usuário não autenticado. Faça login para continuar.");
        }
        
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->findUsuarioById($_SESSION['id']);
        //$_SESSION['usuario'] = $usuario;
        
        preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/",$_POST['validade'], $matches);
        $mes = (int)$matches[1];
        $ano = (int)$matches[2] + 2000;

        $url = 'http://payment.avanth.kinghost.net/api/payments/pay-with-credit-card';
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

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === FALSE) {
            echo "Erro ao fazer a requisição.";
        } else {
            // Lê o código HTTP da resposta
            $httpCode = null;
            if (isset($http_response_header[0])) {
                preg_match('{HTTP\/\S*\s(\d{3})}', $http_response_header[0], $match);
                $httpCode = $match[1];
            }

            echo "Código da resposta: $httpCode\n";
            echo "Resposta da API:\n$response";
        }
        
        $_SESSION['type'] = 'success';
        $_SESSION['message'] = 'Pagamento realizado com sucesso! Obrigado por sua doação.';
        header("Location: ../index.php");
        exit();
    } else {
        throw new Exception("Método inválido para esta requisição.");
    }

} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    if ($logadont){
        header('Location: ../view/pages/login.php');
    } else {
        header('Location: ../view/pages/Usuario/pagamento_Usuario.php');
    }
    exit();
}
