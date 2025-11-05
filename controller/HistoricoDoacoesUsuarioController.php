<?php 

require_once(dirname(__FILE__) ."/../model/DoacaoModel.php");
require_once(dirname(__FILE__) ."/../services/RelatorioService.php");
$modelDoacao = new DoacaoModel();
$relatorioService= new RelatorioService();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $idDoacao = trim($_GET['id']);

    if (!empty($idDoacao))
    {
        $relatorio = $relatorioService->gerarComprovanteDoacao($idDoacao);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="comprovante.pdf"');
        echo $relatorio;
    }
}

?>