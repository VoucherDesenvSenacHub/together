<?php
require_once __DIR__ . '/../config/database.php';

class ValidarCadastroOngModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar(); // PDO
    }

    public function BuscarCadastroOng(int $id)
    {
        $sql = "SELECT O.razao_social, 
        O.telefone, 
        O.cnpj, 
        CO.nome as categoria_ong, 
        U.email,
        E.numero,
        E.cep,
        E.logradouro,
        E.complemento,
        E.bairro,
        E.cidade,
        E.estado
        FROM ongs O
        JOIN  categorias_ongs CO
        ON O.id_categoria = CO.id
        JOIN usuarios U
        ON O.id_usuario = U.id
        JOIN enderecos E
        ON O.id_endereco = E.id
        WHERE O.id = :id";        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // fetchAll já retorna um array associativo com id e nome de cada linha
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
