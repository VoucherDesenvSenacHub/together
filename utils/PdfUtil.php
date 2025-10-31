<?php
require_once __DIR__ . "/../config/autoload.php";

use Dompdf\Dompdf;

class PdfUtil
{
    public function gerarPdf($html)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        // $dompdf->stream();
        return $dompdf->output();
    }
}