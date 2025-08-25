<?php
include_once "../model/UsuarioModel.php";

$sucesso = false;
$imagem = '';
$model = new UsuarioModel();
// $models = new UsuarioModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = trim($_POST['nome'] ?? ''); 
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $data_nascimento = trim($_POST['dt_nascimento'] ?? '');
    // $data_formatada = date('d/m/Y', strtotime($data_nascimento));
    $cpf = trim($_POST['cpf'] ?? '');
    $tipo_perfil = $_POST['tipo_perfil'] ?? '';
    $id_imagem_de_perfil = $_POST['id_imagem_de_perfil'] ?? null;
    // Limpar máscara
    $cpf = preg_replace('/\D/', '', $cpf);
    $telefone = preg_replace('/\D/', '', $telefone);

    // Validações
    if (empty($nome) || strlen($nome) < 10) {
        $_SESSION['mensagem'] = "Nome deve ter pelo menos 10 caracteres.";
    }

    if (!preg_match('/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$/u', $nome)) {
        $_SESSION['mensagem'] = "Nome inválido. Utilize apenas letras e espaços.";
    }

    $nomeSanitizado = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['mensagem'] = "Telefone inválido. Deve conter 10 ou 11 dígitos.";
    }

    // VALIDAR SINTAXE EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem'] = "E-mail inválido.";
    }

    // VALIDAR DOMINIOM MX
    $dominio = substr(strrchr($email, "@"), 1);
    if (!checkdnsrr($dominio, "MX")) {
        $_SESSION['mensagem'] = "Domínio de e-mail inválido ou inexistente.";
    }

    // validar data
    // if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
    //     $_SESSION['mensagem'] = "Data de nascimento deve estar no formato AAAA-MM-DD.";
    // } else {
    //     $data_parts = explode('-', $data_nascimento);
    //     if (!checkdate((int)$data_parts[1], (int)$data_parts[2], (int)$data_parts[0])) {
    //         $_SESSION['mensagem'] = "Data de nascimento inválida.";
    //     }
    // }
    
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $nomeOriginal = $_FILES['imagem']['name'];
        $tamanho = $_FILES['imagem']['size'];
        $tipoImagem = $_FILES['imagem']['type'];
    
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $nomeFinal = uniqid('img_', true) . '.' . $extensao;
        $tamanhoMaximo = 2 * 1024 * 1024;
        $diretorioDestino = __DIR__ . '/upload/';
    
        // Verifica se diretório existe
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0755, true);
        }
    
        // Verifica extensões permitidas
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $typesPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    
        // Verifica se a extensão é permitida
        if (!in_array($extensao, $extensoesPermitidas)) {
            die('Extensão de imagem não permitida.');
        }
    
        // Verifica tamanho
        if($tamanho > $tamanhoMaximo){
            die('Arquivo muito grande.');
        }
        
    
        $caminhoFinal = $diretorioDestino . $nomeFinal;
    
        if (move_uploaded_file($imagemTmp, $caminhoFinal)) {
            $caminhoNoBanco = 'upload/' . $nomeFinal;
    
            // Insere no banco usando seu model
            $imagem = $model->inserirImagem($caminhoNoBanco, $nomeFinal, $nomeOriginal);
        }
    
    }

    $sucesso = $model->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $imagem);
}
header("Location: ../../../together/view/pages/Usuario/editarInformacoes.php");
exit;
?>

<!-- HTML para exibir a mensagem -->
<?php
if (!empty($_SESSION['mensagem'])) {
    echo "<p style='color: red; font-weight: bold;'>" . htmlspecialchars($_SESSION['mensagem']) . "</p>";
    unset($_SESSION['mensagem']);
}
?>