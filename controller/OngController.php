<?php
require_once __DIR__ . '/../model/OngModel.php';

class OngController
{
    private $ongModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->ongModel = new OngModel();
    }

    public function verificarCnpj()
    {
        if (ob_get_level()) ob_end_clean();
        error_reporting(E_ERROR | E_PARSE);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cnpj'])) {
            $cnpj = trim($_POST['cnpj']);
            $existe = $this->ongModel->cnpjExiste($cnpj);

            header('Content-Type: application/json');
            echo json_encode(['existe' => $existe]);
            exit;
        }

        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Requisição inválida']);
        exit;
    }
}

// Roteamento AJAX
$controller = new OngController();
if (isset($_GET['action']) && $_GET['action'] === 'verificarCnpj') {
    $controller->verificarCnpj();
}
