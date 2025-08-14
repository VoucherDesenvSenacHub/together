<?php
// PRECISA DE UMA CAIXA DE WARNING OU ALERT PARA AVISAR QUE DEU CERTO/ERRADO OU QUALQUER OUTRA COISA AO INVES DE ECHO 

$id = 1;
$model = new UsuarioModel(); 
$usuario = $model->buscarUsuarioId($id); 
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $data_nascimento = trim($_POST['data_nascimento'] ?? '');
    $data_formatada = date('d/m/Y', strtotime($data_nascimento));
    $cpf = trim($_POST['cpf'] ?? '');
    $tipo_perfil = $_POST['tipo_perfil'] ?? '';
    $id_imagem_de_perfil = $_POST['id_imagem_de_perfil'] ?? null;

    // Limpar máscara
    $cpf = preg_replace('/\D/', '', $cpf);
    $telefone = preg_replace('/\D/', '', $telefone);

    // Validações
    if (empty($nome) || strlen($nome) < 10) {
        $_SESSION['mensagem'] = "Nome deve ter pelo menos 10 caracteres.";
        header("Location: editarInformacoes.php");
        exit;
    }

    if (!preg_match('/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$/u', $nome)) {
        $_SESSION['mensagem'] = "Nome inválido. Utilize apenas letras e espaços.";
        header("Location: editarInformacoes.php");
        exit;
    }

    $nomeSanitizado = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
    echo $nomeSanitizado;

    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        $_SESSION['mensagem'] = "Telefone inválido. Deve conter 10 ou 11 dígitos.";
        header("Location: editarInformacoes.php");
        exit;
    }

    // VALIDAR SINTAXE EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensagem'] = "E-mail inválido.";
        header("Location: editarInformacoes.php");
        exit;
    }

    // VALIDAR DOMINIOM MX
    $dominio = substr(strrchr($email, "@"), 1);
    if (!checkdnsrr($dominio, "MX")) {
        $_SESSION['mensagem'] = "Domínio de e-mail inválido ou inexistente.";
        header("Location: editarInformacoes.php");
        exit;
    }

    // if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
    //     $_SESSION['mensagem'] = "Data de nascimento deve estar no formato AAAA-MM-DD.";
    //     header("Location: editarInformacoes.php");
    //     exit;
    // } else {
    //     $data_parts = explode('-', $data_nascimento);
    //     if (!checkdate((int)$data_parts[1], (int)$data_parts[2], (int)$data_parts[0])) {
    //         $_SESSION['mensagem'] = "Data de nascimento inválida.";
    //         header("Location: editarInformacoes.php");
    //         exit;
    //     }
    // }

    // Tudo ok, editar usuário
    $sucesso = $model->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem_de_perfil);

    if ($sucesso) {
        $_SESSION['mensagem'] = "Usuário editado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao editar usuário.";
    }

    header("Location: editarInformacoes.php");
    exit;
}
?>

<!-- HTML para exibir a mensagem -->
<?php
if (!empty($_SESSION['mensagem'])) {
    echo "<p style='color: red; font-weight: bold;'>" . htmlspecialchars($_SESSION['mensagem']) . "</p>";
    unset($_SESSION['mensagem']);
}
?>