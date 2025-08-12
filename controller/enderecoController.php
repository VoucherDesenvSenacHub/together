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
 
    public function salvarEdicao()

    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {

            $endereco = [

                'id' => $_POST['id'],

                'logradouro' => $_POST['logradouro'],

                'numero' => $_POST['numero'],

                'cep' => $_POST['cep'],

                'complemento' => $_POST['complemento'],

                'bairro' => $_POST['bairro'],

                'cidade' => $_POST['cidade'],

                'estado' => $_POST['estado'],

            ];
 
            $resultado = $this->enderecoModel->editar($endereco);
 
            if ($resultado) {

                // Por exemplo, redirecionar para página de perfil ou listar

                header('Location: editarInformacoes.php');

                exit;

            } else {

                // Pode setar um erro pra exibir na view

                return false;

            }

        }

    }

}

 