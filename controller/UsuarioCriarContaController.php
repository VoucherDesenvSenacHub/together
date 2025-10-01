<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

session_start();

// Controla os steps do criarConta.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST['step_action'] ?? null;
    $usuarioModel = new UsuarioModel();
    $validarCpf = $usuarioModel->findUsuarioByCpf($_POST['cpf']);
    $validarEmail = $usuarioModel->findUsuarioByEmail($_POST['email']);
    if (!$validarCpf && !$validarEmail) {
        if ($acao === "next" && $_SESSION['step'] < 2) {
            guardarDadosContaNaSession();
            header("Location: /together/view/pages/criarConta.php");
            exit;
        } elseif ($acao === "prev" && $_SESSION['step'] > 1) {
            $_SESSION['step'] = $_SESSION['step'] - 1;
            header("Location: /together/view/pages/criarConta.php");
            exit;
        } elseif ($acao === "salvar") {
            if ($_POST('senha') === $_POST('confirmar_senha')) {
                registrarDadosConta();
                tirarDadosContaDaSession();
                header("Location: /together/view/pages/login.php");
                exit;
            } else {
                $_SESSION['type'] = 'erro';
                $_SESSION['message'] = 'Confirmação de senha incorreta.';
                header("Location: /together/view/pages/criarConta.php");
                exit;
            }
        }
    } else {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Os dados informados já estão cadastrados!';
        header("Location: /together/view/pages/criarConta.php");
        exit;
    }
}

function guardarDadosContaNaSession()
{
    $_SESSION['step'] = $_SESSION['step'] + 1;
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['cpf'] = $_POST['cpf'];
    $_SESSION['telefone'] = $_POST['telefone'];
    $_SESSION['email'] = $_POST['email'];
}

function tirarDadosContaDaSession()
{
    unset($_SESSION['nome']);
    unset($_SESSION['cpf']);
    unset($_SESSION['telefone']);
    unset($_SESSION['email']);
    unset($_SESSION['step']);
}

function registrarDadosConta()
{
    $usuarioModel = new UsuarioModel();

    // Só entra no try se todos os dados estiverem preenchidos
    try {
        $ok = $usuarioModel->registrarDadosOng(
            $_SESSION['id'] ?? null,
            $_SESSION['razao_social'] ?? null,
            $_SESSION['cnpj'] ?? null,
            $_SESSION['telefone'] ?? null,
            $_SESSION['id_categoria'] ?? null,
        );

        if (!$ok['response']) {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao cadastrar dados da ONG.';
            $_SESSION['step'] = $_SESSION['step'] - 1;
        }

        $_SESSION['id_endereco'] = $ok['id_endereco'];
    } catch (Exception $e) {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'Ocorreu um erro!';
        $_SESSION['step'] = $_SESSION['step'] - 1;
        $_SESSION['erro'] = 'Erro: ' . $e->getMessage();
        // header("Location: /together/view/pages/criarConta.php");
        exit;
    }
}
