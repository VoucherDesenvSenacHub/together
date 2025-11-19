<?php

/**
 * 
 * @param string $name 
 * @param string $id 
 * @param array $listaOptions 
 * 
 * @return string
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

function selectCategoriasOng($name, $id, $listaOptions = [], $selected = null)
{
    $select = "
        <select name='$name' id='$id' class='formulario-select' required>
    ";

    foreach ($listaOptions as $option) {
        $isSelected = ($selected == $option['id']) ? "selected" : "";
        $select .= "<option value='" . $option['id'] . "' $isSelected>" . $option['nome'] . "</option>";
    }

    $select .= "
        </select>
    ";

    return $select;
}

