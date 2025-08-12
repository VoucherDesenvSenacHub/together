<?php

require_once __DIR__ . "/../model/enderecoModel.php";
require_once __DIR__ . "/../model/usuarioModel.php";

class EnderecoController
{
    private $enderecoModel;
    private $usuarioModel;
    private $endereco;

    public function __construct()
    {
        $this->enderecoModel = new EnderecoModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function carregarEnderecoPorUsuario($idUsuario)
    {
        $idEndereco = $this->usuarioModel->buscarEnderecoIdPorUsuarioId($idUsuario);
 
        if (!$idEndereco) {
            return null;
        }

        $this->endereco = $this->enderecoModel->buscarEnderecoPorId($idEndereco);
 
        return $this->endereco;
    }
 
    public function atualizarEnderecoDoUsuario($idUsuario, $dadosEndereco)
    {
        $idEndereco = $this->usuarioModel->buscarEnderecoIdPorUsuarioId($idUsuario);
 
        if (!$idEndereco) {
            return false;
        }
 
        $dadosEndereco['id'] = $idEndereco;
 
        return $this->enderecoModel->editar($dadosEndereco);
    }

}
