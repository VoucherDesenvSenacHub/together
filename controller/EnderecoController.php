<?php

require_once __DIR__ . "/../model/EnderecoModel.php";

class EnderecoController
{
    private $enderecoModel;

    public function __construct()
    {
        $this->enderecoModel = new EnderecoModel();
    }

    public function atualizarEndereco($id , $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado)
    {
        $endereco = [
            'id' => $id,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'cep' => $cep,
            'complemento' => $complemento,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,
        ];

        if (!empty($id)) {
            $resultado = $this->enderecoModel->editar($endereco);
        } else {
            $resultado = $this->enderecoModel->criar($endereco);
        }

        if ($resultado['response']) {
            return $resultado['response'];
        } else {
            $_SESSION['type'] = 'erro';
            $_SESSION['message'] = 'Ocorreu um erro ao salvar o endereço';
            return $resultado['response'];
            // $_SESSION['erro'] = $resultado['erro'];
        }
    }
}
