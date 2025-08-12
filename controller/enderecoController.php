<?php

require_once "../../../model/enderecoModel.php";

class EnderecoController
{
    private $enderecoModel;
    private $enderecos;

    public function __construct($id)
    {
        $this->enderecoModel = new EnderecoModel();
        $this->enderecos = $this->enderecoModel->buscarEnderecoPorId($id);
    }

    public function getEnderecos()
    {
        return $this->enderecos;
    }

    public function salvarEdicao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {

            $endereco = [
                'id'          => $_POST['id'] ?? null,
                'logradouro'  => $_POST['logradouro'] ?? '',
                'numero'      => $_POST['numero'] ?? '',
                'cep'         => $_POST['cep'] ?? '',
                'complemento' => $_POST['complemento'] ?? '',
                'bairro'      => $_POST['bairro'] ?? '',
                'cidade'      => $_POST['cidade'] ?? '',
                'estado'      => $_POST['estado'] ?? ''
            ];

            $resultado = $this->enderecoModel->editar($endereco);

            if ($resultado) {
                header('Location: editarInformacoes.php');
                exit;
            } else {
                return false;
            }
        }
    }
}
