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

    // Função para validar CEP
    function validarCEP($cep) {
        // Remove tudo que não for número
        $cepLimpo = preg_replace('/\D/', '', $cep);
        
        // Verifica se tem exatamente 8 dígitos
        if (strlen($cepLimpo) != 8) {
            return false;
        }
        
        // Verifica se não são todos números iguais (00000000, 11111111, etc.)
        if (preg_match('/^(\d)\1{7}$/', $cepLimpo)) {
            return false;
        }
        
        return true;
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

    // Validação do CEP
    if (!validarCEP($_POST['cep'])) {
        $erros[] = "CEP informado não é válido!";
    }

    //Verifica se o metodo é post, define tamanho maximo da imagem e tipo permitidos
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $TamanhoMax = 16 * 1024 * 1024;
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg','image/webp'];
        $extensoesPermitidas = ['jpeg', 'png', 'jpg', 'webp'];

        $file = $_FILES['imagem'];
        
        if($file['error'] !== UPLOAD_ERR_OK){
            die("erro no upload");
        }

        if($file['size']> $TamanhoMax){
            die("Arquivo muito grande. Máximo permitido é 16 MB!");
        }

        $fileMime = mime_content_type($file['tmp_name']);
        if (!in_array($fileMime, $tiposPermitidos)) {
            die("Tipo de arquivo inválido. Só aceitamos JPEG, PNG, JPG ou WEBP.");
        }

        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($extensao, $extensoesPermitidas)) {
            die("Extensão de arquivo inválida. Extensões permitidas: jpeg, jpg, png, webp.");
        }

        $destino = "" . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            echo "Upload realizado com sucesso!";
        } else {
            echo "Erro ao salvar o arquivo.";
        }
    }

    // Instancia o modelo da ONG
    $ongModel = new OngModel();
    
    // Limpa CNPJ e telefone para verificação
    $cnpjLimpo = preg_replace('/\D/', '', $_POST['cnpj']);
    $telefoneLimpo = preg_replace('/\D/', '', $_POST['telefone']);
    
    // Verifica se a ONG já existe (apenas se não estivermos editando a mesma ONG)
    if (!empty($cnpjLimpo) && !empty($telefoneLimpo)) {
        $resultadoVerificacao = $ongModel->verificaExisteDadosOng($cnpjLimpo, $_POST['nome'], $telefoneLimpo);
        
        if (!$resultadoVerificacao['response']) {
            $erros[] = "Erro ao verificar dados da ONG: " . $resultadoVerificacao['erro'];
        } elseif ($resultadoVerificacao['existe']) {
            // Aqui você pode adicionar uma verificação adicional se está editando a própria ONG
            // Por exemplo, verificar se o ID da ONG atual é diferente da encontrada
            $erros[] = "Já existe uma ONG cadastrada com esses dados (CNPJ, nome ou telefone)!";
        }
    }

    // verfica se existe erro e exibe ao usuario
    if (!empty($erros)) {
        throw new Exception(implode("<br>", $erros));
    }

    // Se chegou ate aqui dai sim  pode atualizar a ONG
    // Pega o ID da ONG da sessão
    if (!isset($_SESSION['id_ong']) || empty($_SESSION['id_ong'])) {
        throw new Exception("ID da ONG não encontrado na sessão. Faça login novamente!");
    }
    
    $idOng = $_SESSION['id_ong'];

    // Converte a data para o formato do banco 
    $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));
    
    // Chama a função de atualização
    $resultado = $ongModel->atualizarOng(
        $idOng,
        $_POST['nome'],
        $telefoneLimpo,
        $cnpjLimpo,
        $dataFormatada,
        $_POST['email'],
        $_POST['cep'],
        $_POST['logradouro'],
        $_POST['complemento'] ?? '',
        $_POST['numero'],
        $_POST['bairro'],
        $_POST['cidade']
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