<?php

use Dompdf\Dompdf;

require __DIR__ . '/../vendor/autoload.php';

class RelatorioService
{
    public function gerarComprovanteDoacao($idDoacao)
    {
        $id = $idDoacao;

        ob_start();
        require __DIR__ . '/../reports/comprovanteDoacao.php';
        $relatorioComprovante = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($relatorioComprovante);
        $dompdf->setPaper('A4');
        $dompdf->render();

        $dompdf->stream();
    }
}