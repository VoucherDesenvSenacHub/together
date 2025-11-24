<?php
require_once __DIR__ . '/../model/OngModel.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST['step_action'] ?? null;
    $ongModel = new OngModel();
    $usuarioTemOng = $ongModel->verificarUsuarioTemOng($_SESSION['id']);
    if (!$usuarioTemOng) {
        if ($acao === "next" && $_SESSION['step'] < 2) {
            if (verificarDadosOng()) {
                $_SESSION['type'] = 'erro';
                $_SESSION['message'] = 'Os dados informados já estão cadastrados.';
                header("Location: /together/view/pages/cadastrarOng.php");
            } else {
                $_SESSION['step'] = $_SESSION['step'] + 1;
                $_SESSION['razao_social'] = $_POST['razao_social'];
                $_SESSION['cnpj'] = $_POST['cnpj'];
                $_SESSION['telefone'] = $_POST['telefone'];
                $_SESSION['id_categoria'] = $_POST['id_categoria'];
                header("Location: /together/view/pages/cadastrarOng.php");
            }
        } elseif ($acao === "prev" && $_SESSION['step'] > 1) {
            $_SESSION['step'] = $_SESSION['step'] - 1;
            header("Location: /together/view/pages/cadastrarOng.php");
        } elseif ($acao === "salvar") {
            registrarDados();
            unset($_SESSION['razao_social']);
            unset($_SESSION['cnpj']);
            unset($_SESSION['telefone']);
            unset($_SESSION['id_categoria']);
            registrarEndereco();
            unset($_SESSION['id_endereco']);
            unset($_SESSION['step']);
            header("Location: /together/index.php");
        }
    } else {
        $_SESSION['type'] = 'erro';
        $_SESSION['message'] = 'O usuario já possue uma ONG!';
        header("Location: /together/view/pages/cadastrarOng.php");
    }
}

function verificarDadosOng()
{
    $ongModel = new OngModel();
    $_POST['cnpj'] = preg_replace('/\D/', '', $_POST['cnpj']);
    $_POST['telefone'] = preg_replace('/\D/', '', $_POST['telefone']);
    if (!empty($_POST['cnpj'] && $_POST['telefone'])) {
        // echo ($cnpjLimpo);
        $existe = $ongModel->verificaExisteDadosOng($_POST['cnpj'], $_POST['razao_social'], $_POST['telefone']);
        return $existe['existe'];
    }
}

function registrarDados()
{
    $ongModel = new OngModel();

  
    try {
        $ok = $ongModel->registrarDadosOng(
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
        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    }
}

function registrarEndereco()
{
    $ongModel = new OngModel();

    
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
