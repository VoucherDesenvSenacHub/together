<?php

/**
 * Renderiza um componente de select
 * 
 * @param string $name - é através do name que pegamos o value desse select com o PHP;
 * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
 * @param array $listaOptions - é utilizado para criar options;
 * 
 * @return string - HTML para renderizar o select;
 */


function selectReadonly($name, $id, $listaOptions = [])
{
    $select = "
            <select name='$name' id='$id' class='formulario-select' readonly>
            ";

    foreach ($listaOptions as $option) {
        $select .= "<option value='$option'>$option</option>";
    }

    $select .= "
            </select>
            ";

    return $select;
}

function selectRequired($name, $id, $listaOptions = [])
{
    $select = "
            <select name='$name' id='$id' class='formulario-select' required>
            ";

    foreach ($listaOptions as $option) {
        $select .= "<option value='$option'>$option</option>";
    }

    $select .= "
            </select>
            ";

    return $select;
}

// function selectDefault($name, $id, $listaOptions = [])
// {
//     $select = "
//             <select name='$name' id='$id' class='formulario-select'>
//             ";

//     foreach ($listaOptions as $option) {
//         $select .= "<option value='$option'>$option</option>";
//     }

//     $select .= "
//             </select>
//             ";

//     return $select;
// }

function selectDefault($name, $id, $listaOptions = [], $valorSelecionado = '')
{
    $select = "<select name='$name' id='$id' class='formulario-select'>";
    $select .= "<option value=''>Selecione</option>";

    foreach ($listaOptions as $value => $texto) {
        $selecionado = ($value === $valorSelecionado) ? ' selected' : '';
        $select .= "<option value='$value'$selecionado>$texto</option>";
    }

    $select .= "</select>";

    return $select;
}

function selectCategoriasOng($name, $id, $listaOptions = [])
{
    $select = "
            <select name='$name' id='$id' class='formulario-select' required>
            ";

    foreach ($listaOptions as $option) {
        $select .= "<option value='" . $option['id'] . "'>" . $option['nome'] . "</option>";
    }

    $select .= "
            </select>
            ";

    return $select;
}
