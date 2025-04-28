<?php 

    /**
     * Renderiza um componente de select
     * 
     * @param string $name - é através do name que pegamos o value desse select com o PHP;
     * @param string $id - é utilizado para atribuir uma identificação única **ADICIONAR ESSE ID NO FOR DO LABEL**;
     * @param array $listaOptions - é utilizado para criar options;
     * @param boolean $readonly - Bool para determinar se o select é somente de leitura;
     * @param boolean $required - Bool para determinar se o input precisa ser obrigatóriamente preenchido;
     * 
     * @return string - HTML para renderizar o select;
     */


     function selectReadonly($name, $id, $listaOptions = []) {
            $select = "
            <select name='$name' id='$id' class='formulario-select' readonly>
            ";
    
            foreach($listaOptions as $option) {
                $select .= "<option value='$option'>$option</option>";
            }
    
            $select .= "
            </select>
            ";
    
            return $select;
        }

        function selectRequired($name, $id, $listaOptions = []) {
            $select = "
            <select name='$name' id='$id' class='formulario-select' required>
            ";
    
            foreach($listaOptions as $option) {
                $select .= "<option value='$option'>$option</option>";
            }
    
            $select .= "
            </select>
            ";
    
            return $select;
        }

    function selectDefault($name, $id, $listaOptions = []) {
            $select = "
            <select name='$name' id='$id' class='formulario-select'>
            ";

            foreach($listaOptions as $option) {
                $select .= "<option value='$option'>$option</option>";
            }

            $select .= "
            </select>
            ";

            return $select;
        }
?>