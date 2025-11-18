<?php    

    /**

     * 
     * @param string $id 
     * @param string $name 
     * @param string $value
     * 
     * @return string 
     */

    function textareaRequired($id, $name, $value="") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' required>$value</textarea> ";        
    }

     function textareaReadonly($id, $name, $value = "") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' readonly>$value</textarea> ";
    }

    function textareaDefault($id, $name) {
        return " <textarea class='formulario-textarea' id='$id' name='$name'></textarea> ";           
    };

    function textareaRequiredMaxLength($id, $name, $value="", $maxLength="") {
        return " <textarea class='formulario-textarea' id='$id' name='$name' maxlength='$maxLength' required>$value</textarea> ";        
    }
?>