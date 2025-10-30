<?php

use Dompdf\Dompdf;

require '../vendor/autoload.php';

class RelatorioService
{
    public function gerarComprovanteDoacao()
    {
        ob_start();
        require '../reports/comprovanteDoacao.php';
        $relatorioComprovante = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($relatorioComprovante);
        $dompdf->setPaper('A4');
        $dompdf->render();

        $dompdf->stream();
    }
}


$relatorioService = new RelatorioService();
$relatorioService->gerarComprovanteDoacao();
