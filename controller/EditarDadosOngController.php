<?php
session_start();
require_once __DIR__ . "/../model/OngModel.php";
require_once __DIR__ . "/../controller/UploadController.php";

try {

    $erros = [];
    
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $_SESSION['erro'] = "Método inválido para esta requisição";
        header("location: ./../view/pages/ong/perfilOng.php");
        exit;
    }
    
    $campos = ['nome', 'telefone', 'cnpj', 'data', 'email', 'cep', 'logradouro', 'numero', 'cidade'];

    
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $erros[] = "O campo {$campo} é obrigatório!";
        }
    }
    
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um email válido!";
    }

    
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

    function VerificarNumerosRepetidos($numeroVerificado, $quantidadeDeDigitos, $quantidadeDeDigitos2 = null)
    {
        
        if ($quantidadeDeDigitos2 !== null) {
            $range = "{" . $quantidadeDeDigitos . "," . $quantidadeDeDigitos2 . "}";
        } else {
            $range = "{" . $quantidadeDeDigitos . "}";
        }

        
        $pattern = '/^(\d)\1' . $range . '$/';

      
        return preg_match($pattern, $numeroVerificado) === 1;
    }

    $verificarCep = preg_replace('/\D/', "", $_POST['cep']);
    if (strlen($verificarCep) < 8 || strlen($verificarCep) > 8) {
        $erros[] = "CEP informado é invalido!";
    }

    if (VerificarNumerosRepetidos($verificarCep, 7, null)) {
        $erros[] = "CEP informado é invalido: sequência repetida.";
    }


    
    $VerificarCnpj = preg_replace('/\D/', '', $_POST['cnpj']);
    if (strlen($VerificarCnpj) != 14) {  
        $erros[] = 'CNPJ informado é  invalido!';
    }

    if (VerificarNumerosRepetidos($verificarCnpj, 13, null)) {
        $erros[] = 'CNPJ informado não é valido: sequência repetida.';
    }

    
    $PesoVerificadorCnpj1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $PesoVerificadorCnpj2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    intval($VerificarCnpj);
    $base = substr($VerificarCnpj, 0, 12);
    $soma = 0;
    for ($i = 0; $i < 12; $i++) {
        $soma += (int) $base[$i] * $pesoVerificadorCnpj1[$i];
    }
    $resto = $soma % 11;

    $dv1 = ($resto < 2) ? 0 : 11 - $resto;

   
    $base13 = $base . $dv1;

    $soma = 0;
    for ($i = 0; $i < 13; $i++) {
        $soma += (int) $base13[$i] * $pesoVerificadorCnpj2[$i];
    }
    $resto = $soma % 11;
    $dv2 = ($resto < 2) ? 0 : 11 - $resto;

    if ($verificarCnpj[12] != $dv1 || $verificarCnpj[13] != $dv2) {
        $erros[] = "CNPJ informado é invalido!";
    }

   
    $VerificarTelefone = preg_replace("/\D/", "", $_POST["telefone"]);
    if (strlen($VerificarTelefone) < 10 || strlen($VerificarTelefone) > 11) {
        $erros[] = 'Número de telefone inválido: quantidade de dígitos insuficiente ';
    }

    
    if (strlen($VerificarTelefone) == 11 && substr($VerificarTelefone, 2, 1) != '9') {
        $erros[] = 'Número de celular inválido: deve começar com 9.';
    }

    if (VerificarNumerosRepetidos($verificarTelefone, 9, 10)) {
        $erros[] = 'Número de telefone inválido: sequência repetida.';
    }
    
    $ongModel = new OngModel();

    
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        throw new Exception("ID da ONG não encontrado na sessão. Faça login novamente!");
    }
    $idOng = (int) $_SESSION['id'];

    
    $dadosAtuais = $ongModel->buscarOngPorId($idOng);
    if (!$dadosAtuais) {
        throw new Exception("ONG não encontrada.");
    }

    
    $map = [
        'nome' => ['db' => 'razao_social', 'oldKey' => 'nome'],
        'telefone' => ['db' => 'telefone', 'oldKey' => 'telefone'],
        'cnpj' => ['db' => 'cnpj', 'oldKey' => 'cnpj'],
    ];

    foreach ($map as $postCampo => $info) {
        $dbCampo = $info['db'];
        $oldKey = $info['oldKey'];

        
        $rawNovo = $_POST[$postCampo] ?? '';


        if ($dbCampo === 'cnpj') {
            $valorNovo = preg_replace('/\D/', '', $rawNovo);
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? preg_replace('/\D/', '', $dadosAtuais[$oldKey]) : '';
        } elseif ($dbCampo === 'telefone') {
            $valorNovo = preg_replace('/\D/', '', $rawNovo);
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? preg_replace('/\D/', '', $dadosAtuais[$oldKey]) : '';
        } else {
            
            $valorNovo = mb_strtolower(trim($rawNovo));
            $valorAntigo = isset($dadosAtuais[$oldKey]) ? mb_strtolower(trim($dadosAtuais[$oldKey])) : '';
        }

       
        if ($valorNovo === '') {
            continue;
        }

        
        if ($valorNovo !== $valorAntigo) {
           
            if ($ongModel->verificaExisteCampo($dbCampo, $valorNovo, $idOng)) {
                $erros[] = "Já existe uma ONG com esse {$postCampo}!";
            }
        }
    }

    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    $idImagem = !empty($_POST['id_imagem']) ? (int) $_POST['id_imagem'] : null;

    
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $upload = new UploadController();

        $idImagemProcessado = $upload->processar($_FILES['file'], $idImagem, 'ongs');

        if ($idImagemProcessado === false) {
            
            header('Location: /together/view/pages/ong/perfilOng.php');
            exit;
        }
        
        $idImagem = $idImagemProcessado;
    }

    
    $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

    
    $resultado = $ongModel->atualizarOng(
        $idOng,
        $_POST['nome'],
        $verificarTelefone,
        $verificarCnpj,
        $dataFormatada,
        $_POST['email'],
        $verificarCep,
        $_POST['logradouro'],
        $_POST['complemento'] ?? '',
        $_POST['numero'],
        $_POST['estado'],
        $_POST['cidade'],
        $novoIdImagem ?? null
    );

    if ($resultado) {
        
        $_SESSION["sucesso"] = "Informações atualizadas com sucesso!";
        header("location: ./../view/pages/ong/perfilOng.php");
    } else {
        throw new Exception("Erro ao atualizar os dados da ONG!");
    }
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header("location: ./../view/pages/ong/perfilOng.php");
    exit();
}

?>