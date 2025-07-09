<?php 

    /**
     * Renderiza um componente de input
     * 
     * @param string $type - tipo do input (text, number, file, etc);
     * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
     * @param string $name - é através do name que pegamos o value desse input com o PHP;
     * @param string $value - esse parâmetro somente vai ser usado se o readonly estiver true;
     * 
     * @return string - HTML para renderizar o input;
     */

     function inputRequired($type, $id, $name, $value = "") {
        return " <input class='formulario-input' type='$type' id='$id' name='$name' required value='$value'> ";
     }

     function inputReadonly($type, $id, $name, $value = "") {
        return " <input class='formulario-input' type='$type' id='$id' name='$name' readonly value='$value'> ";
    }

    function inputDefault($type, $id, $name) {
        return " <input class='formulario-input' type='$type' id='$id' name='$name'> ";
    };

    function inputCheckBox($type, $id, $name) {
        return " <input class='formulario-input-checkbox' type='$type' id='$id' name='$name'> ";
    };

    function inputFilter($type, $id, $name, $placeholder = "") {
        return " <input class='formulario-input' type='$type' id='$id' name='$name' placeholder='$placeholder'> ";
    };


?>