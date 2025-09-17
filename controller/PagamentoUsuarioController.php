<?php
session_start();

function numeroValido($numero) {
    $numero = preg_replace('/\D/', '', $numero);
    $soma = 0;
    $par = false;

    for ($i = strlen($numero) - 1; $i >= 0; $i--) {
        $digito = (int)$numero[$i];

        if ($par) {
            $digito *= 2;
            if ($digito > 9) {
                $digito -= 9;
            }
        }

        $soma += $digito;
        $par = !$par;
    }

    return $soma % 10 === 0;
}

try {
    $logadont = !isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['perfil']) || empty($_SESSION['perfil']);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nome = $_POST['nome'];
        $numero = $_POST['numero'];
        $validade = trim($_POST['validade']);
        $cvv = $_POST['cvv'];
        
        if($logadont) {
            throw new Exception("Usuário não autenticado. Faça login para continuar.");
        }

        // Verificar campos obrigatórios
        if (empty($nome) || empty($numero) || empty($validade) || empty($cvv)) {
            throw new Exception("Por favor, preencha todos os campos obrigatórios.");
        }

        // Nome: letras e espaços (com acentos), até 100 caracteres
        if (!preg_match("/^[\p{L}\s]+$/u", $nome) || strlen($nome) > 100) {
            throw new Exception("Nome inválido. Deve conter apenas letras e espaços, com no máximo 100 caracteres.");
        }

        // Número do cartão: 16 dígitos
        if (strlen($numero) !== 16 || !ctype_digit($numero)) {
            throw new Exception("Número do cartão inválido. Deve conter exatamente 16 dígitos numéricos.");
        }

        // Validade: formato e ano mínimo
        if (!preg_match("/^(0[1-9]|1[0-2])\/(\d{2})$/", $validade, $matches)) {
            throw new Exception("Validade inválida. Formato correto: MM/AA.");
        }

        $mes = (int)$matches[1];
        $ano = (int)$matches[2];


        $anoAtual = (int)date("y");
        $mesAtual = (int)date("m");

        if ($ano < $anoAtual || ($ano === $anoAtual && $mes < $mesAtual)) {
            throw new Exception("Cartão vencido. Use um cartão com validade futura.");
        }


        // CVV: exatamente 3 dígitos
        if (!preg_match("/^\d{3}$/", $cvv) || strlen($cvv) !== 3 || !ctype_digit($cvv)) {
            throw new Exception("CVV inválido. Deve conter exatamente 3 dígitos.");
        }

        if (!numeroValido($numero)) {
            throw new Exception("Número do cartão inválido.");
        }


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
