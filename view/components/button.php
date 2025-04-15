<?php

function botao($tipo, $texto){
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

    return "<button class='$class'>$texto</button>";
}