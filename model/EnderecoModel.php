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
        $query = "SELECT * FROM $this->tabela WHERE id = :id";
        $query = "SELECT e.logradouro, e.numero, e.cep, e.complemento, e.bairro, c.nome as cidade, es.nome as estado FROM $this->tabela e INNER JOIN cidades c ON e.id_cidade = c.id INNER JOIN estados es ON c.id_estado = es.id WHERE e.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function editar($endereco)
    {

        $query = "UPDATE $this->tabela SET logradouro=:logradouro, numero=:numero, cep=:cep, complemento=:complemento, bairro=:bairro,  id_cidade=:id_cidade WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $endereco["id"]);
        $stmt->bindParam(':logradouro', $endereco["logradouro"]);
        $stmt->bindParam(':numero', $endereco["numero"]);
        $stmt->bindParam(':cep', $endereco["cep"]);
        $stmt->bindParam(':complemento', $endereco["complemento"]);
        $stmt->bindParam(':bairro', $endereco["bairro"]);
        $stmt->bindParam(':id_cidade', $endereco["id_cidade"]);
        /*inner join do estado*/
        return $stmt->execute();
    }
}
