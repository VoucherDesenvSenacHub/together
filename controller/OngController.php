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
            registrar();
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
            registrar();
            unset($_SESSION['step']);
            header("Location: /together/index.php");
        }
    }
}

function verificarDadosOng()
{
    // talvez verificar o numero na tb usuarios e o mesmo com email

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
    $ongModel = new OngModel();

    // Verifica se todos os dados do passo 1 estão preenchidos
    if ($_SESSION['step'] === 1) {
        $id_usuario    = $_SESSION['id'] ?? null;
        $cnpj          = $_POST['cnpj'] ?? '';
        $razao_social  = $_POST['razao_social'] ?? '';
        $telefone      = $_POST['telefone'] ?? '';
        $id_categoria  = $_POST['id_categoria'] ?? '';
        echo($razao_social);

    } else if ($_SESSION['step'] === 2) {
        $cep        = $_POST['cep'] ?? '';
        $logradouro = $_POST['logradouro'] ?? '';
        $bairro     = $_POST['bairro'] ?? '';
        $estado     = $_POST['estado'] ?? '';
        $cidade     = $_POST['cidade'] ?? '';
        $numero     = $_POST['numero'] ?? '';
        $complemento= $_POST['complemento'] ?? '';

    }

    // Só entra no try se todos os dados estiverem preenchidos
    try {
        $ok = $ongModel->registrarOng(
            $id_usuario ?? null,
            $razao_social ?? null,
            $cnpj ?? null,
            $telefone ?? null,
            $id_categoria ?? null,
            $logradouro ?? null,
            $numero ?? null,
            $cep ?? null,
            $complemento ?? null,
            $bairro ?? null,
            $cidade ?? null,
            $estado ?? null
        );

        if ($ok) {
            $_SESSION['type'] = 'successo';
            $_SESSION['message'] = 'ONG cadastrada com sucesso!';
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Erro ao cadastrar ONG.';
        }

        header("Location: /together/view/pages/cadastrarOng.php");
        exit;

    } catch (Exception $e) {
        $_SESSION['type'] = 'error';
        $_SESSION['message'] = 'Erro: ' . $e->getMessage();
        header("Location: /together/view/pages/cadastrarOng.php");
        exit;
    }
}

