<?php 

require_once "../../../model/EnderecoModel.php";

class EnderecoController {
    public $enderecoModel = new EnderecoModel();
    public $enderecos = $enderecoModel->buscarEnderecoPorId(1);
    foreach ($enderecos as $endereco) {
        
    }

    return $endereco;
}