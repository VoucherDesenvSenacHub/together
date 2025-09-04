<?php

require_once "../model/OngModel.php";

class OngController
{
    private $ongModel;

    public function __construct()
    {
        $this->ongModel = new OngModel();
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {

            $id_usuario      = $_POST['id_usuario'] ?? null;
            $razao_social    = $_POST['razao_social'] ?? '';
            $cnpj            = $_POST['cnpj'] ?? '';
            $dt_fundacao     = $_POST['dt_fundacao'] ?? '';
            $conselho_fiscal = $_POST['conselho_fiscal'] ?? '';
            $logradouro      = $_POST['logradouro'] ?? '';
            $numero          = $_POST['numero'] ?? '';
            $cep             = $_POST['cep'] ?? '';
            $complemento     = $_POST['complemento'] ?? '';
            $bairro          = $_POST['bairro'] ?? '';
            $cidade          = $_POST['cidade'] ?? '';
            $estado          = $_POST['estado'] ?? '';
            $id_categoria    = $_POST['id_categoria'] ?? null;

            $resultado = $this->ongModel->registrarOng(
                $id_usuario,
                $razao_social,
                $cnpj,
                $dt_fundacao,
                $conselho_fiscal,
                $logradouro,
                $numero,
                $cep,
                $complemento,
                $bairro,
                $cidade,
                $estado,
                $id_categoria
            );

            if ($resultado) {
                $_SESSION['message'] = 'Cadastro enviado com sucesso!';
                $_SESSION['type'] = 'sucesso';
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['message'] = 'Erro ao cadastrar ONG.';
                $_SESSION['type'] = 'erro';
                header('Location: cadastrarOng.php');
                exit;
            }
        }
    }

    public function atualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {

            $id                 = $_POST['id'] ?? null;
            $razao_social       = $_POST['razao_social'] ?? '';
            $cnpj               = $_POST['cnpj'] ?? '';
            $dt_fundacao        = $_POST['dt_fundacao'] ?? '';
            $conselho_fiscal    = $_POST['conselho_fiscal'] ?? '';
            $id_categoria       = $_POST['id_categoria'] ?? null;
            $id_imagem_de_perfil = $_POST['id_imagem_de_perfil'] ?? null;

            $resultado = $this->ongModel->editarOng(
                $id,
                $razao_social,
                $cnpj,
                $dt_fundacao,
                $conselho_fiscal,
                $id_categoria,
                $id_imagem_de_perfil
            );

            if ($resultado) {
                $_SESSION['message'] = 'ONG atualizada com sucesso!';
                $_SESSION['type'] = 'sucesso';
                header('Location: editarOng.php?id=' . $id);
                exit;
            } else {
                $_SESSION['message'] = 'Erro ao atualizar ONG.';
                $_SESSION['type'] = 'erro';
                header('Location: editarOng.php?id=' . $id);
                exit;
            }
        }
    }
}
