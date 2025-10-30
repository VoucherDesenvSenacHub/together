<?php
class RelatorioService
{
    public function gerarComprovanteDoacao()
    {
        ob_start();
        require __DIR__ . '/../reports/comprovanteDoacao.php';
        $relatorioComprovanteHtml = ob_get_clean();
        // Esse trecho eu tenho que mover para o utils, o service chama uma funcao util para gerar o relatorio
        return ;
    }
}