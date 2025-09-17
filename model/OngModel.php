<?php

require_once __DIR__ . '/../config/database.php';

class OngModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }
    public function findOngBySearch($nome_ong)
    {
        $sql = "SELECT razao_social, dt_fundacao, status_validacao FROM ongs WHERE razao_social LIKE :nome_ong";
        $stmt = $this->conn->prepare($sql);
        $nome_ong = '%' . $nome_ong . '%';
        $stmt->bindParam(':nome_ong', $nome_ong);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findVoluntarioBySearch($nome_usuario)
    {
        $sql = "SELECT V.dt_associacao, U.nome
                      FROM voluntarios V 
                      JOIN usuarios U ON U.id = V.id_usuario 
                      WHERE U.nome
                      LIKE :nome_usuario
                      ORDER BY V.dt_associacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_usuario = '%' . $nome_usuario . '%';
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function findDonorSearch($nome_doador)
    {
        $sql = "SELECT D.dt_doacao, U.nome, D.valor
                      FROM doacoes D 
                      JOIN usuarios U ON U.id = D.id_usuario 
                      WHERE U.nome
                      LIKE :nome_doador
                      ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        $nome_doador = '%' . $nome_doador . '%';
        $stmt->bindParam(':nome_doador', $nome_doador);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroDataHoraDoacoes($id_ong, $data_inicio=NULL, $data_fim=NULL)
    {
        if (is_null($data_inicio) || is_null($data_fim)) {
            $sql = "SELECT D.dt_doacao, U.nome, D.valor
                          FROM doacoes D 
                          JOIN usuarios U ON U.id = D.id_usuario 
                          WHERE D.id_ong = :id_ong
                          ORDER BY D.dt_doacao DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ong', $id_ong);
        } else{
            $sql = "SELECT D.dt_doacao, U.nome, D.valor
                          FROM doacoes D 
                          JOIN usuarios U ON U.id = D.id_usuario 
                          WHERE D.dt_doacao BETWEEN :data_inicio AND :data_fim
                          AND D.id_ong = :id_ong
                          ORDER BY D.dt_doacao DESC";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ong', $id_ong);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroDataHoraVoluntarios($id_ong, $data_inicio=NULL, $data_fim=NULL){
        if( is_null($data_inicio) || is_null($data_fim)) {
            $sql = "SELECT V.dt_associacao, U.nome, U.id
                          FROM voluntarios V 
                          JOIN usuarios U ON U.id = V.id_usuario 
                          WHERE V.id_ong = :id_ong
                          ORDER BY V.dt_associacao DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ong', $id_ong);
        } else{
            $sql = "SELECT V.dt_associacao, U.nome, U.id
                          FROM voluntarios V 
                          JOIN usuarios U ON U.id = V.id_usuario 
                          WHERE V.dt_associacao BETWEEN :data_inicio AND :data_fim
                          AND V.id_ong = :id_ong
                          ORDER BY V.dt_associacao DESC";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ong', $id_ong);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function registrarDadosOng($id_usuario, $razao_social, $cnpj, $telefone, $id_categoria)
    {
        try {
            // Inicia a transação
            $this->conn->beginTransaction();

            // Insere endereço vazio
            $queryEndereco = "INSERT INTO enderecos (logradouro, numero, cep, complemento, bairro, cidade, estado) VALUES ('', 0, '', '', '', '', '')";
            $stmt = $this->conn->prepare($queryEndereco);
            $stmt->execute();
            $id_endereco = $this->conn->lastInsertId();

            // Insere a ONG vinculada ao endereço
            $queryOng = "INSERT INTO ongs (id_usuario, razao_social, cnpj, telefone, id_endereco, id_categoria) VALUES (:id_usuario, :razao_social, :cnpj, :telefone, :id_endereco, :id_categoria)";
            $stmt = $this->conn->prepare($queryOng);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':razao_social', $razao_social);
            $stmt->bindParam(':cnpj', $cnpj);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':id_endereco', $id_endereco);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->execute();

            // Confirma transação
            $this->conn->commit();
            return [
                'response' => true,
                'id_endereco' => $id_endereco
            ];
        } catch (Exception $e) {
            // Em caso de erro, desfaz tudo
            $this->conn->rollBack();
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function editarEnderecoOng($id_endereco, $logradouro, $numero, $cep, $complemento, $bairro, $cidade, $estado)
    {
        try {
            $query = "UPDATE enderecos SET logradouro=:logradouro, numero=:numero, cep=:cep, complemento=:complemento, bairro=:bairro,  cidade=:cidade, estado=:estado WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id_endereco);
            $stmt->bindParam(':logradouro', $logradouro);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            return [
                'response' => true
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function editarPostagemDaOng($id_postagem,$titulo,$dt_postagem,$descricao, $link){
        try{
            // Vai ter que criar um sistema que seja capaz de criar um ID para a imagem e idexar ela aqui ness table: id_imagem = :id_imagem
            $q = "UPDATE postagens SET titulo = :titulo, dt_postagem = :dt_postagem, descricao = :descricao, link = :link  WHERE id = :id_postagem";
            $stmt = $this->conn->prepare($q);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':dt_postagem', $dt_postagem);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':id_postagem', $id_postagem);
            $stmt->execute();
            return [
                'response' => true
            ];

        } catch (Exception $e){
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function verificaExisteDadosOng($cnpj, $razao_social, $telefone)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj or razao_social = :razao_social or telefone = :telefone");

        $stmt->execute([
            ':cnpj' => $cnpj,
            ':razao_social' => $razao_social,
            ':telefone' => $telefone,
        ]);

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] > 0;
    }

    public function verificarUsuarioTemOng($id)
    {
        $query = "SELECT o.razao_social
        FROM usuarios u
        INNER JOIN ongs o ON o.id_usuario = u.id
        WHERE u.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
