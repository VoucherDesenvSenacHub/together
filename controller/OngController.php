<?php
require_once __DIR__ . '/../model/OngModel.php';

session_start();

// Se o form foi enviado, controlar navegação
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST['step_action'] ?? null;

    if ($acao === "next" && $_SESSION['step'] < 2) {
        $_SESSION['step'] = $_SESSION['step'] + 1;
        header("Location: /together/view/pages/cadastrarOng.php");

    } elseif ($acao === "prev" && $_SESSION['step'] > 1) {
        $_SESSION['step'] = $_SESSION['step'] - 1;
        header("Location: /together/view/pages/cadastrarOng.php");

    } elseif ($acao === "salvar") {
        unset($_SESSION['step']);
        header("Location: /together/index.php");
        exit;
    }
}

// class OngController
// {
//     private $ongModel;

//     public function __construct()
//     {
//         if (session_status() === PHP_SESSION_NONE) {
//             session_start();
//         }
//         $this->ongModel = new OngModel();
//     }

//     // AJAX: verifica duplicidade de CNPJ
//     public function verificarCnpj()
//     {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cnpj'])) {
//             $cnpj = trim($_POST['cnpj']);
//             $existe = $this->ongModel->existeCnpj($cnpj);

//             echo json_encode([
//                 'existe' => $existe,
//                 'message' => $existe ? 'CNPJ já cadastrado!' : ''
//             ]);
//             exit;
//         }
//         echo json_encode(['existe' => false, 'message' => 'Requisição inválida']);
//         exit;
//     }

//     // Cadastro final da ONG
//     public function registrar()
//     {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $id_usuario = $_SESSION['id_usuario'] ?? null;
//             $razao_social = $_POST['razao_social'] ?? '';
//             $cnpj = $_POST['cnpj'] ?? '';
//             $logradouro = $_POST['logradouro'] ?? '';
//             $numero = $_POST['numero'] ?? '';
//             $cep = $_POST['cep'] ?? '';
//             $complemento = $_POST['complemento'] ?? '';
//             $bairro = $_POST['bairro'] ?? '';
//             $cidade = $_POST['cidade'] ?? '';
//             $estado = $_POST['estado'] ?? '';
//             $id_categoria = $_POST['id_categoria'] ?? '';

//             try {
//                 $ok = $this->ongModel->registrarOng(
//                     $id_usuario, $razao_social, $cnpj, $logradouro, $numero,
//                     $cep, $complemento, $bairro, $cidade, $estado, $id_categoria
//                 );

//                 if ($ok) {
//                     $_SESSION['type'] = 'success';
//                     $_SESSION['message'] = 'ONG cadastrada com sucesso!';
//                     header("Location: /together/view/pages/cadastrarOng.php");
//                     exit;
//                 } else {
//                     $_SESSION['type'] = 'error';
//                     $_SESSION['message'] = 'Erro ao cadastrar ONG.';
//                     header("Location: /together/view/pages/cadastrarOng.php");
//                     exit;
//                 }
//             } catch (Exception $e) {
//                 $_SESSION['type'] = 'error';
//                 $_SESSION['message'] = 'Erro: ' . $e->getMessage();
//                 header("Location: /together/view/pages/cadastrarOng.php");
//                 exit;
//             }
//         }
//     }
// }

// // Roteamento simples
// $controller = new OngController();
// if (isset($_GET['action'])) {
//     switch ($_GET['action']) {
//         case 'verificarCnpj': $controller->verificarCnpj(); break;
//         case 'registrar': $controller->registrar(); break;
//     }
// }
