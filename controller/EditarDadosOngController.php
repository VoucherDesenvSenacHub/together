<?php
session_start();

require_once __DIR__ . "/../model/OngModel.php";

try {
    $erros = [];
    // verifica se o metodo é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $erros[] = "Método inválido para esta requisição";
    }
    // campos que devem ser preenchidos e verifica se está vazio.
    $campos = ['nome', 'telefone', 'cnpj', 'data', 'email', 'cep', 'logradouro', 'numero', 'bairro', 'cidade'];

    // verica todos os campos estão preenchidos
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $erros[] = "O campo {$campo} é obrigatório!";
        }
    }
    //verifica se está enviando um email válido
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um email válido!";
    }

    // verifica se é uma data valida e se não é maior que o ano atual
    $VerificarData = explode('/', $_POST['data']);
    if (count($VerificarData) === 3) {
        $dia = (int) $VerificarData[0];
        $mes = (int) $VerificarData[1];
        $ano = (int) $VerificarData[2];
        if (!checkdate($mes, $dia, $ano)) {
            $erros[] = "Insira uma data válida!";
        } elseif ($ano > date("Y")) {
            $erros[] = "O ano não pode ser maior que o ano atual!";
        }
    } else {
        $erros[] = "Insira uma data válida!";
    }

    function VerificarNumerosRepetidos($NumeroVerificado, $QuantidadeDeDigitos, $QuantidadeDeDigitos2 = null)
    {
        // monta o intervalo do quantificador do regex
        if ($QuantidadeDeDigitos2 !== null) {
            $range = "{" . $QuantidadeDeDigitos . "," . $QuantidadeDeDigitos2 . "}";
        } else {
            $range = "{" . $QuantidadeDeDigitos . "}";
        }

        // monta o regex dinâmico
        $pattern = '/^(\d)\1' . $range . '$/';

        // verifica
        return preg_match($pattern, $NumeroVerificado) === 1;
    }


    // retira tudo que não for número do cnpj
    $VerificarCnpj = preg_replace('/\D/', '', $_POST['cnpj']);
    if (strlen($VerificarCnpj) != 14) { // verifica se tem 14 números 
        $erros[] = 'CNPJ informado não é valido!';
    }

    if (VerificarNumerosRepetidos($VerificarCnpj, 13, null)) {
        $erros[] = 'Cnpj informado não é valido!';
    }




    // verficar se o cnpj é valido
    $PesoVerificadorCnpj1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $PesoVerificadorCnpj2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    intval($VerificarCnpj);
    $base = substr($VerificarCnpj, 0, 12);
    $soma = 0;
    for ($i = 0; $i < 12; $i++) {
        $soma += (int) $base[$i] * $PesoVerificadorCnpj1[$i];

    }
    $resto = $Soma % 11;

    $dv1 = ($resto < 2) ? 0 : 11 - $resto;

    // usando os 13 primeiros digitos do cnpj
    $base13 = $base . $dv1;

    $soma = 0;
    for ($i = 0; $i < 13; $i++) {
        $soma += (int) $base13[$i] * $PesoVerificadorCnpj2[$i];

    }
    $resto = $Soma % 11;
    $dv2 = ($resto < 2) ? 0 : 11 - $resto;

    if ($VerificarCnjp[12] != $dv1 || $VerificarCnjp[13] != $dv2) {
        $erros[] = "CNPJ informado é invalido!";
    }

    // pega o telefone informado e remove tudo que não for número
    $VerificarTelefone = preg_replace("/\D/", "", $_POST["telefone"]);
    if (strlen($VerificarTelefone) < 10 || strlen($VerificarTelefone) > 11) {
        $erros[] = 'Número de telefone inválido: quantidade de dígitos insuficiente ';
    }

    // se for celular (11 dígitos), verificar se começa com 9
    if (strlen($VerificarTelefone) == 11 && substr($VerificarTelefone, 2, 1) != '9') {
        $erros[] = 'Número de celular inválido: deve começar com 9.';
    }

    if (VerificarNumerosRepetidos($VerificarTelefone, 9, 10)) {
        $erros[] = 'Número de telefone inválido: sequência repetida.';
    }




    $ongModel = new OngModel();
    $_POST['cnpj'] = preg_replace('/\D/', '', $_POST['cnpj']);
    $_POST['telefone'] = preg_replace('/\D/', '', $_POST['telefone']);
    if (!empty($_POST['cnpj'] && $_POST['telefone'])) {
        // echo ($cnpjLimpo);
        $existe = $ongModel->verificaExisteDadosOng($_POST['cnpj'], $_POST['nome'], $_POST['telefone']);
        var_dump($existe);
    }

    // verfica se existe erro e exibe ao usuario
    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    // retorna mensagem de sucesso e volta para pagina de perfil da ong
    $_SESSION["sucesso"] = "Informações atualizadas com sucesso!";
    header("location: ./../view/pages/Ong/perfilOng.php");
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header("location: ./../view/pages/Ong/perfilOng.php");
    exit();

}
;



?>