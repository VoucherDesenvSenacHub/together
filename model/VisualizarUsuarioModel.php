
<?php

require_once __DIR__ . '/../config/database.php';

class UsuarioModel
{
    private $conn;
    protected $tabela = "ongs";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function DataNomeUsuario(
        $razao_social,
        $dt_fundacao
    ){
        try{

            $query = "SELECT * FROM $this->tabela razao_social, dt_fundacao VALUES(razao_social, dt_fundacao)" ;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':razao_social', $razao_social["razao_social"]);
            $stmt->bindParam(':dt_fundacao', $dt_fundacao["dt_fundacao"]);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

            
        }
    }
}

?>