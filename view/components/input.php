<?php 

    /**
     * Renderiza um componente de input
     * 
     * @param string $type - tipo do input (text, number, file, etc);
     * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
     * @param string $name - é através do name que pegamos o value desse input com o PHP;
     * @param boolean $required - Bool para determinar se o input precisa ser obrigatóriamente preenchido;
     * @param boolean $readonly - Bool para determinar se o input é somente de leitura;
     * @param string $value - esse parâmetro somente vai ser usado se o readonly estiver true;
     * 
     * @return string - HTML para renderizar o input;
     */

    function input($type, $id, $name, $required = false, $readonly = false, $value = "") {
        if ($required and $readonly) {
            return "ERRO! as variáveis 'required' e 'readonly' não podem ser true ao mesmo tempo! ";
        } elseif ($readonly) {
            return " <input class='formulario-input' type='$type' id='$id' name='$name' readonly value='$value'> ";
        } 
        elseif ($required) {
            return " <input class='formulario-input' type='$type' id='$id' name='$name' required> ";

        } else {
            return " <input class='formulario-input' type='$type' id='$id' name='$name'> ";
        };
    };

?>