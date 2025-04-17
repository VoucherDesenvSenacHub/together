<?php

function botao($tipo, $texto, $formaction = true){
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

    return "<button formaction='$formaction' class='$class'>$texto</button>";
}