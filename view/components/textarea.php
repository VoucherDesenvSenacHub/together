<?php    

    /**
     * Renderiza um componente de textarea
     * 
     * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
     * @param string $name - é através do name que pegamos o value desse textarea com o PHP;
     * @param string $value - esse parâmetro somente vai ser usado se o readonly estiver true;
     * 
     * @return string - HTML para renderizar o textarea;
     */

    function textareaRequired($id, $name, $value="") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' required>$value</textarea> ";        
    }

     function textareaReadonly($id, $name, $value = "") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' readonly>$value</textarea> ";
    }

    function textareaDefault($id, $name) {
        return " <textarea class='formulario-textarea' id='$id' name='$name'></textarea> ";           
    };

    function textareaRequiredMaxLength($id, $name, $value="", $maxLength="") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' maxlength='$maxLength' required>$value</textarea> ";        
    }
?>