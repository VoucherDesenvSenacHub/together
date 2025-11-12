<?php
require_once __DIR__ . "/../config/autoload.php";

use Dompdf\Dompdf;

class PdfUtil
{
    public function gerarPdf($html)
    {
        try
        {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4');
            $dompdf->render();
            
            return $dompdf->output();
        }
        catch(Exception $e)
        {
            error_log('Erro ao gerar o PDF: '. $e->getMessage());
        }
    }
}