<?php
require_once __DIR__ . '/../model/OngModel.php';

session_start();

// Controla os steps do cadastrarOng.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST['step_action'] ?? null;

    if ($acao === "next" && $_SESSION['step'] < 2) {
        if (verificarDadosOng()) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Os dados informados já estão cadastrados.';
            header("Location: /together/view/pages/cadastrarOng.php");
        } else {
            $_SESSION['step'] = $_SESSION['step'] + 1;
            registrarDados();
            header("Location: /together/view/pages/cadastrarOng.php");
        }
    } elseif ($acao === "prev" && $_SESSION['step'] > 1) {
        $_SESSION['step'] = $_SESSION['step'] - 1;
        header("Location: /together/view/pages/cadastrarOng.php");
    } elseif ($acao === "salvar") {
        if (verificarCepOng()) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Os dados informados já estão cadastrados.';
            header("Location: /together/view/pages/cadastrarOng.php");
        } else {
            registrarEndereco();
            unset($_SESSION['step']);
            header("Location: /together/index.php");
        }
    }
}

function verificarDadosOng()
{
    // talvez verificar o numero na tb usuarios e o mesmo com email

    $ongModel = new OngModel();
    $_POST['cnpj'] = preg_replace('/\D/', '', $_POST['cnpj']);
    $_POST['telefone'] = preg_replace('/\D/', '', $_POST['telefone']);
    if (!empty($_POST['cnpj'] && $_POST['telefone'])) {
        // echo ($cnpjLimpo);
        $existe = $ongModel->verificaExisteDadosOng($_POST['cnpj'], $_POST['razao_social'], $_POST['telefone'], $_POST['email']);
        // var_dump($existe);
        return $existe;
    }
}
function verificarCepOng()
{
    $ongModel = new OngModel();
    $_POST['cep'] = preg_replace('/\D/', '', $_POST['cep']);
    if (!empty($_POST['cep'])) {
        // echo ($cepLimpo);
        $existe = $ongModel->verificaExisteCepOng($_POST['cep']);
        // var_dump($existe);
        return $existe;
    }
}

function registrarDados()
{
    $ongModel = new OngModel();

    // Só entra no try se todos os dados estiverem preenchidos
    try {
        $ok = $ongModel->registrarDadosOng(
            $_SESSION['id'] ?? null,
            $_POST['razao_social'] ?? null,
            $_POST['cnpj'] ?? null,
            $_POST['telefone'] ?? null,
            $_POST['id_categoria'] ?? null,
        );

        if (!$ok['response']) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao cadastrar dados da ONG.';
            $_SESSION['step'] = $_SESSION['step'] - 1;
        }

        $_SESSION['id_endereco'] = $ok['id_endereco'];

        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Ocorreu um erro!';
        $_SESSION['step'] = $_SESSION['step'] - 1;
        $_SESSION['erro'] = 'Erro: ' . $e->getMessage();
        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    }
}

function registrarEndereco()
{
    $ongModel = new OngModel();

    // Só entra no try se todos os dados estiverem preenchidos
    try {
        $id_endereco = $_SESSION['id_endereco'];
        $ok = $ongModel->editarEnderecoOng(
            $id_endereco ?? null,
            $_POST['logradouro'] ?? null,
            $_POST['numero'] ?? null,
            $_POST['cep'] ?? null,
            $_POST['complemento'] ?? null,
            $_POST['bairro'] ?? null,
            $_POST['cidade'] ?? null,
            $_POST['estado'] ?? null,
        );

        if ($ok['response']) {
            $_SESSION['type'] = 'sucesso';
            $_SESSION['message'] = 'ONG cadastrada com sucesso!';
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao cadastrar endereço ONG.';
            header("Location: /together/view/pages/cadastrarOng.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Ocorreu um erro!';
        $_SESSION['erro'] = 'Erro: ' . $e->getMessage();
        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    }
}
