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
            WHERE O.id = :id
        ";   
             
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // fetchAll já retorna um array associativo com id e nome de cada linha
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ValidarPerfilUsuario(int $idDaOng):array{
        $queryConsultaUsuario = "SELECT U.tipo_perfil 
            FROM ongs O 
            JOIN usuarios U 
            ON O.id_usuario = U.id 
            WHERE O.id = :id
        "; 

        $stmt = $this->conn->prepare($queryConsultaUsuario);
        $stmt->bindParam(":id", $idDaOng, PDO::PARAM_INT);     
        $stmt->execute();
        return $stmt->fetch();
    }
    public function AtualizarStatusValidacao(int $idDaOng, string $tipo_alteracao){
        try{
            $queryAtualizaStatusValidacao = "UPDATE ongs 
                SET status_validacao = :tipo 
                WHERE id = :id
            ";        

            $stmt = $this->conn->prepare($queryAtualizaStatusValidacao);
            $stmt->bindParam(":id", $idDaOng, PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $tipo_alteracao, PDO::PARAM_STR);        
            $stmt->execute();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public function AtualizarTipoDeUsuario(string $statusAlteracao, $idDaOng){
        try{
            if($statusAlteracao === 'aprovado') {
                $queryAtualizaUsuario = "UPDATE usuarios U 
                    SET U.tipo_perfil = 'Ong'
                    WHERE id = (SELECT id_usuario FROM ongs WHERE id = :id)
                ";

                $stmtUser = $this->conn->prepare($queryAtualizaUsuario);
                $stmtUser->bindParam(":id", $idDaOng, PDO::PARAM_INT);
                return $stmtUser->execute();
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}
