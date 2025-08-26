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
            // registrar aqui!!
            unset($_SESSION['step']);
            header("Location: /together/index.php");
        }
    }
}

function verificarDadosOng()
{
    $ongModel = new OngModel();
    $cnpjLimpo = preg_replace('/\D/', '', $_POST['cnpj']);
    $telefoneLimpo = preg_replace('/\D/', '', $_POST['telefone']);
    if (!empty($cnpjLimpo)) {
        // echo ($cnpjLimpo);
        $existe = $ongModel->verificaExisteDadosOng($cnpjLimpo, $_POST['razao_social'], $telefoneLimpo, $_POST['email']);
        // var_dump($existe);
        return $existe;
    }
}
function verificarCepOng()
{
    $ongModel = new OngModel();
    $cepLimpo = preg_replace('/\D/', '', $_POST['cep']);
    if (!empty($cepLimpo)) {
        // echo ($cepLimpo);
        $existe = $ongModel->verificaExisteCepOng($cepLimpo);
        // var_dump($existe);
        return $existe;
    }
}

// Cadastro final da ONG
function registrar()
{
    // ver se precisa adicionar email
    
    $ongModel = new OngModel();
    $id_usuario = $_SESSION['id'] ?? null;
    // $email = $_POST['email'] ?? '';
    $cnpj = $_POST['cnpj'] ?? '';
    $razao_social = $_POST['razao_social'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';
    $logradouro = $_POST['logradouro'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';

    try {
        $ok = $ongModel->registrarOng(
            $id_usuario,
            $razao_social,
            $cnpj,
            $logradouro,
            $numero,
            $cep,
            $complemento,
            $bairro,
            $cidade,
            $estado,
            $id_categoria
        );

        if ($ok) {
            $_SESSION['type'] = 'success';
            $_SESSION['message'] = 'ONG cadastrada com sucesso!';
            header("Location: /together/view/pages/cadastrarOng.php");
            exit;
        } else {
            $_SESSION['type'] = 'error';
            $_SESSION['message'] = 'Erro ao cadastrar ONG.';
            header("Location: /together/view/pages/cadastrarOng.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['type'] = 'error';
        $_SESSION['message'] = 'Erro: ' . $e->getMessage();
        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    }
}
