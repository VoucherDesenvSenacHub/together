<?php    

    /**
     * Renderiza um componente de label
     * 
     * @param string $for -  é usado para associar a label a um input **ADICIONE O ID DO INPUT, TEXTAREA AQUI!**;
     * @param string $content - é o conteúdo que será exibido pelo label (nome, idade, telefone, etc);
     * 
     * @return string - HTML para renderizar o label;
     */

    function label($for, $content) {
        return " <label class='formulario-label' for='$for'>$content</label> ";
    };

?>