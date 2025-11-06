<?php 

require_once(dirname(__FILE__) ."/../services/RelatorioService.php");

$relatorioService= new RelatorioService();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $idOng = trim($_GET['id']);

    if (!empty($idOng))
    {
        $relatorio = $relatorioService->gerarRelatorioDoacoesOng($idOng);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="relatorio-doacoes-ong.pdf"');
        echo $relatorio;
    }
}

?>