<?php

/**

 * 
 * @param string $type 
 * @param string $id 
 * @param string $name 
 * @param string $value 
 * 
 * @return string
 */

function inputRequired($type, $id, $name, $value = "")
{
    return " <input class='formulario-input' type='$type' id='$id' name='$name' required value='$value'> ";
}

function inputReadonly($type, $id, $name, $value = "")
{
    return " <input class='formulario-input' type='$type' id='$id' name='$name' readonly value='$value'> ";
}

function inputDefault($type, $id, $name, $value = "")
{
    return " <input class='formulario-input' type='$type' id='$id' name='$name' value='$value'> ";
};

function inputCheckBox($id, $name, $value, $checked = "")
{
    return " <input class='formulario-input-checkbox' type='checkbox' id='$id' name='$name' value='$value' $checked> ";
};

function inputFilter($type, $id, $name, $placeholder="", $value = "")
{
    return " <input class='formulario-input' type='$type' id='$id' name='$name' placeholder='$placeholder' value='$value'> ";
};

function inputRequiredMaxLength($type, $id, $name, $value = "", $maxLength = "")
{
    return " <input class='formulario-input' type='$type' id='$id' name='$name' required value='$value' maxlength='$maxLength'> ";
}
