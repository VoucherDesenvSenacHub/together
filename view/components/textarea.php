<?php    

    /**
     * Renderiza um componente de textarea
     * 
     * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
     * @param string $name - é através do name que pegamos o value desse textarea com o PHP;
     * @param boolean $required - Bool para determinar se o textarea precisa ser obrigatóriamente preenchido;
     * @param boolean $readonly - Bool para determinar se o textarea é somente de leitura;
     * @param string $value - esse parâmetro somente vai ser usado se o readonly estiver true;
     * 
     * @return string - HTML para renderizar o textarea;
     */

    function textarea($id, $name, $required = false, $readonly = false, $value = "") {
        if ($required and $readonly) {
            return "ERRO! as variáveis 'required' e 'readonly' não podem ser true ao mesmo tempo! ";
        } elseif ($readonly) {
            return " <textarea class='formulario-textarea' id='$id' name='$name' readonly>$value</textarea> ";        
        } 
        elseif ($required) {
            return " <textarea class='formulario-textarea' id='$id' name='$name' required></textarea> ";        

        } else {
            return " <textarea class='formulario-textarea' id='$id' name='$name'></textarea> ";        
        };
    };

?>