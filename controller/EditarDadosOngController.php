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