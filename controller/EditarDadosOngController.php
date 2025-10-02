<?php
session_start();

require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../controller/UploadController.php";


try {

    $erros = [];
    // verifica se o metodo é post
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $erros[] = "Método inválido para esta requisição";
    }
    // campos que devem ser preenchidos e verifica se está vazio.
    $campos = ['nome', 'telefone', 'cnpj', 'data', 'email', 'cep', 'logradouro', 'numero', 'cidade'];

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

    $VerificarCep = preg_replace('/\D/', "", $_POST['cep']);
    if (strlen($VerificarCep) < 8 || strlen($VerificarCep) > 8) {
        $erros[] = "CEP informado é invalido!";
    }

    if (VerificarNumerosRepetidos($VerificarCep, 7, null)) {
        $erros[] = "CEP informado é invalido: sequência repetida.";
    }


    // retira tudo que não for número do cnpj
    $VerificarCnpj = preg_replace('/\D/', '', $_POST['cnpj']);
    if (strlen($VerificarCnpj) != 14) { // verifica se tem 14 números 
        $erros[] = 'CNPJ informado é  invalido!';
    }

    if (VerificarNumerosRepetidos($VerificarCnpj, 13, null)) {
        $erros[] = 'CNPJ informado não é valido: sequência repetida.';
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
    $resto = $soma % 11;

    $dv1 = ($resto < 2) ? 0 : 11 - $resto;

    // usando os 13 primeiros digitos do cnpj
    $base13 = $base . $dv1;

    $soma = 0;
    for ($i = 0; $i < 13; $i++) {
        $soma += (int) $base13[$i] * $PesoVerificadorCnpj2[$i];
    }
    $resto = $soma % 11;
    $dv2 = ($resto < 2) ? 0 : 11 - $resto;

    if ($VerificarCnpj[12] != $dv1 || $VerificarCnpj[13] != $dv2) {
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
    // Pega o ID da ONG da sessão
    $ongModel = new OngModel();

    // garante sessão e id
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        throw new Exception("ID da ONG não encontrado na sessão. Faça login novamente!");
    }
    $idOng = (int) $_SESSION['id'];

    // pega dados atuais
    $dadosAtuais = $ongModel->buscarOngPorId($idOng);
    if (!$dadosAtuais) {
        throw new Exception("ONG não encontrada.");
    }

    // mapa post -> coluna do DB (e qual chave o buscarOngPorId devolve)
    $map = [
        'nome' => ['db' => 'razao_social', 'oldKey' => 'nome'],
        'telefone' => ['db' => 'telefone', 'oldKey' => 'telefone'],
        'cnpj' => ['db' => 'cnpj', 'oldKey' => 'cnpj'],
    ];

    foreach ($map as $postCampo => $info) {
        $dbCampo = $info['db'];
        $oldKey = $info['oldKey'];

        // valor vindo do form
        $rawNovo = $_POST[$postCampo] ?? '';


        if ($dbCampo === 'cnpj') {
            $valorNovo = preg_replace('/\D/', '', $rawNovo);
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? preg_replace('/\D/', '', $dadosAtuais[$oldKey]) : '';
        } elseif ($dbCampo === 'telefone') {
            $valorNovo = preg_replace('/\D/', '', $rawNovo);
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? preg_replace('/\D/', '', $dadosAtuais[$oldKey]) : '';
        } else {
            // strings (nome/razao_social)
            $valorNovo = mb_strtolower(trim($rawNovo));
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? mb_strtolower(trim($dadosAtuais[$oldKey])) : '';
        }

        // Se for vazio (por segurança) pula verificação
        if ($valorNovo === '') {
            continue;
        }

        // Só verifica se realmente mudou
        if ($valorNovo !== $valorAntigo) {
            // chama verificacao passando o nome da coluna no DB
            if ($ongModel->verificaExisteCampo($dbCampo, $valorNovo, $idOng)) {
                $erros[] = "Já existe uma ONG com esse {$postCampo}!";
            }
        }
    }

    // $upload = new UploadController();
    // $idImagem =
    //     $idImagem = $upload->processar($_FILES['file'], $idImagem, 'ongs');

    $idImagem = !empty($_POST['id_imagem']) ? (int) $_POST['id_imagem'] : null;

    // Verifica se um novo arquivo foi enviado
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();
        // Processa o upload, passando o id existente (se houver) e a pasta correta
        $idImagemProcessado = $upload->processar($_FILES['file'], $idImagem, 'ongs');

        if ($idImagemProcessado === false) {
            // Se o upload falhar, a mensagem de erro já foi definida no UploadController
            header('Location: /together/view/pages/Ong/perfilOng.php');
            exit;
        }
        // Atualiza o id da imagem com o retornado pelo processamento
        $idImagem = $idImagemProcessado;
    }

    // Converte a data para o formato do banco 
    $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

    // Chama a função de atualização
    $resultado = $ongModel->atualizarOng(
        $idOng,
        $_POST['nome'],
        $VerificarTelefone,
        $VerificarCnpj,
        $dataFormatada,
        $_POST['email'],
        $VerificarCep,
        $_POST['logradouro'],
        $_POST['complemento'] ?? '',
        $_POST['numero'],
        $_POST['estado'],
        $_POST['cidade'],
        $novoIdImagem ?? null
    );

    if ($resultado) {
        // retorna mensagem de sucesso e volta para pagina de perfil da ong
        $_SESSION["sucesso"] = "Informações atualizadas com sucesso!";
        header("location: ./../view/pages/Ong/perfilOng.php");
    } else {
        throw new Exception("Erro ao atualizar os dados da ONG!");
    }



} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header("location: ./../view/pages/Ong/perfilOng.php");
    exit();
}

?>