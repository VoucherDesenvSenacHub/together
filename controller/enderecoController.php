<?php

require_once "../../../model/enderecoModel.php";

class EnderecoController
{
    public $enderecoModel;
    public $enderecos;

    public function __construct()
    {
        $this->enderecoModel = new EnderecoModel();
        $this->enderecos = $this->enderecoModel->buscarEnderecoPorId(1);
        /*preciso pegar o $id*/
    }

    public function endereco()
    {
        return $this->enderecos;
    }
}
