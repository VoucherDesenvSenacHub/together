<?php

require_once "../../../model/EnderecoModel.php";
require_once "../../../model/UsuarioModel.php";

class EnderecoController
{
    private $enderecoModel;
    private $endereco;
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->enderecoModel = new EnderecoModel();
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

    public function salvarEdicao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {

            $endereco = [
                'id' => $_POST['id'] ?? null,
                'logradouro' => $_POST['logradouro'] ?? '',
                'numero' => $_POST['numero'] ?? '',
                'cep' => $_POST['cep'] ?? '',
                'complemento' => $_POST['complemento'] ?? '',
                'bairro' => $_POST['bairro'] ?? '',
                'cidade' => $_POST['cidade'] ?? '',
                'estado' => $_POST['estado'] ?? ''
            ];

            $resultado = $this->enderecoModel->editar($endereco);

            if ($resultado['response']) {
                $_SESSION['message'] = 'Atualizado com sucesso';
                $_SESSION['type'] = 'sucesso';
                header('Location: editarInformacoes.php');
                exit;
            } else {
                $_SESSION['type'] = 'erro';
                $_SESSION['message'] = 'Ocorreu um erro ao salvar as alterações';
                $_SESSION['erro'] = $resultado['erro'];
            }
        }
    }
}
