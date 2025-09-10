<?php

require_once __DIR__ . "/../model/OngModel.php";

try {

    if ($_SERVER[REQUEST_METHOD] !== "POST") {
        throw new Exception("Método inválido para esta requisição");

    }
}catch(){
    
};


?>