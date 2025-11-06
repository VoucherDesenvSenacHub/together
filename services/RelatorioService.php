<?php

require_once __DIR__ . '/../utils/PdfUtil.php';
class RelatorioService
{
    public function gerarComprovanteDoacao($idDoacao)
    {
        try
        {
            ob_start();
            require __DIR__ . '/../reports/comprovanteDoacaoReport.php';
            $relatorioComprovanteHtml = ob_get_clean();
    
            $pdfUtil = new PdfUtil();
            return $pdfUtil->gerarPdf($relatorioComprovanteHtml);
        }
        catch(Exception $e)
        {
            error_log('Erro ao gerar o comprovante: '. $e->getMessage());
        }
    } 
    
    public function gerarRelatorioDoacoesOng($idOng)
    {
        try
        {
            ob_start();
            require __DIR__ . '/../reports/relatorioDoacoesOngReport.php';
            $relatorioOng = ob_get_clean();
    
            $pdfUtil = new PdfUtil();
            return $pdfUtil->gerarPdf($relatorioOng);
        }
        catch(Exception $e)
        {
            error_log('Erro ao gerar o relatório: '. $e->getMessage());
        }
    }  
}

