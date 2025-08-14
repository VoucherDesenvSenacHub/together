<?php
require_once __DIR__ . '/../config/database.php';


class EnderecoModel
{

    private $conn;
    private $tabela = "enderecos";

    public $id;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function buscarEnderecoPorId($id)
    {
        $query = "SELECT * FROM $this->tabela WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function editar($endereco)
    {
        try {
            $query = "UPDATE $this->tabela SET logradouro=:logradouro, numero=:numero, cep=:cep, complemento=:complemento, bairro=:bairro,  cidade=:cidade, estado=:estado WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $endereco["id"]);
            $stmt->bindParam(':logradouro', $endereco["logradouro"]);
            $stmt->bindParam(':numero', $endereco["numero"]);
            $stmt->bindParam(':cep', $endereco["cep"]);
            $stmt->bindParam(':complemento', $endereco["complemento"]);
            $stmt->bindParam(':bairro', $endereco["bairro"]);
            $stmt->bindParam(':cidade', $endereco["cidade"]);
            $stmt->bindParam(':estado', $endereco["estado"]);

            if ($stmt->execute()) {
                $_SESSION['statusCode'] = 200;
                $_SESSION['message'] = 'Update Endereço';
                return $stmt->execute();
            } else {
                $_SESSION['statusCode'] = 400;
                $_SESSION['message'] = 'Erro Update Endereço';
                return $stmt->execute();
            }

        } catch (PDOException $e) {
            $_SESSION['statusCode'] = 500;
            $_SESSION['message'] = 'Erro no servidor: ' . $e->getMessage();
        }
        
    }
}
