<?php

function botao($tipo, $texto, $id, $formaction = ""){
    switch ($tipo) {
        case 'primary':
            $class = 'botao botao-primary';
            break;
        case 'secondary':
            $class = 'botao botao-secondary';
            break;
        default:
            $class = 'botao botao-primary';
            break;
    }

    return "<button formaction='$formaction' class='$class' id='$id'>$texto</button>";
}