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
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
        $_SESSION['mensagem'] = "Data de nascimento deve estar no formato AAAA-MM-DD.";
    } else {
        $data_parts = explode('-', $data_nascimento);
        if (!checkdate((int)$data_parts[1], (int)$data_parts[2], (int)$data_parts[0])) {
            $_SESSION['mensagem'] = "Data de nascimento inválida.";
        }
    }


    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        // nome temporario da imagem salvo no local temporario do xamp
        $imagemTmp = $_FILES['imagem']['tmp_name'];
  
        // pega o nome original que no caso é o nome que o usuario entrega da foto\
        $nomeOriginal = $_FILES['imagem']['name'];
    
        // extensao padrao para todas as imagens 'jpg'
        $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
       
        // nome unico que é criado para cada foto
        $nomeFinal = uniqid('img_', true) . '.' . $extensao;

        // o diretório aonde está sendo salvo as imagens enviadas dos usuários;
        $diretorioDestino = __DIR__ . '/upload/';
      

        // caso o diretório não exista ele cria
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0755, true);
        }

        // no fim de tudo ele entrega o caminho completo da imagem
        $caminhoFinal = $diretorioDestino . $nomeFinal;
   



        if (move_uploaded_file($imagemTmp, $caminhoFinal)) {
            $caminhoNoBanco = 'upload/' . $nomeFinal;

        }
    
        // Tudo ok, editar usuário

        $imagem = $model->inserirImagem($caminhoNoBanco,$nomeFinal,$nomeOriginal); 
    }
    $sucesso = $model->editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $imagem);
}
// header("Location: ../../../together/view/pages/Usuario/editarInformacoes.php");
// exit;
?>

<!-- HTML para exibir a mensagem -->
<?php
if (!empty($_SESSION['mensagem'])) {
    echo "<p style='color: red; font-weight: bold;'>" . htmlspecialchars($_SESSION['mensagem']) . "</p>";
    unset($_SESSION['mensagem']);
}
?>