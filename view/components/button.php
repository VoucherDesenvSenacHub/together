<?php

function botao($tipo, $texto, $id = "", $formaction = "", $type = "submit",)
{
    switch ($tipo) {
        case 'primary':
            $class = 'botao botao-primary';
            break;
        case 'secondary':
            $class = 'botao botao-secondary';
            break;
        case 'salvar':
            $class = 'botao botao-salvar';
            break;
        case 'cancelar':
            $class = 'botao botao-cancelar';
            break;
        case 'entrar':
            $class = 'botao botao-entrar';
            break;
        case 'excluir':
            $class = 'botao botao-excluir';
            break;
        case 'prev':
            $class = 'prev botao botao-cancelar';
            break;
        case 'next':
            $class = 'next botao botao-salvar';
            break;
        default:
            $class = 'botao botao-primary';
            break;
    }

    return "<button formaction='$formaction' class='$class' type='$type' id='$id'>$texto</button>";
}
