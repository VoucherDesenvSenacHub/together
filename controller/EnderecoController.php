<?php

require_once __DIR__ . "/../model/EnderecoModel.php";

class EnderecoController
{
    private $enderecoModel;

    public function __construct()
    {
        $this->enderecoModel = new EnderecoModel();
    }

    public function editarEndereco($id, $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $endereco = [
                'id' => $id ,
                'logradouro' => $logradouro ,
                'numero' => $numero ,
                'cep' => $cep ,
                'complemento' => $complemento ,
                'bairro' => $bairro,
                'cidade' => $cidade ,
                'estado' => $estado ,
            ];

            $resultado = $this->enderecoModel->editar($endereco);

            if ($resultado['response']) {
                $_SESSION['message'] = 'Atualizado com sucesso';
                $_SESSION['type'] = 'sucesso';
                return true;
            } else {
                $_SESSION['type'] = 'erro';
                $_SESSION['message'] = 'Ocorreu um erro ao salvar as alterações';
                return false;
                // $_SESSION['erro'] = $resultado['erro'];
            }
        }
    }
}
