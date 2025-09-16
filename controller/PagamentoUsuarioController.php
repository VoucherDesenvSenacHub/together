<?php
session_start();

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];
        $validade = $_POST['validade'];
        $cvv = $_POST['cvv'];

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

        if ($ano < 25) {
            throw new Exception("Ano inválido. Use um cartão com validade a partir de 2025.");
        }

        // Opcional: verificar se já está vencido
        $dataValidade = DateTime::createFromFormat('m/y', $validade);
        $dataValidade->modify('last day of this month');
        $hoje = new DateTime();

        if ($dataValidade < $hoje) {
            throw new Exception("Cartão vencido. Use um cartão com validade futura.");
        }

        // CVV: exatamente 3 dígitos
        if (!preg_match("/^\d{3}$/", $cvv)) {
            throw new Exception("CVV inválido. Deve conter exatamente 3 dígitos.");
        }

        // Se chegou aqui, tudo certo — prossiga com a lógica de pagamento
        header("Location: ../index.php");
        exit();
    } else {
        throw new Exception("Método inválido para esta requisição.");
    }

} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header('Location: ../view/pages/Usuario/pagamento_Usuario.php');
    exit();
}
