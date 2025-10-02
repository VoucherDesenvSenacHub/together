<?php

require_once __DIR__ . '/../config/database.php';

class UsuarioModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function registrarUsuarioComEndereco(
        $nome,
        $cpf,
        $telefone,
        $email,
        $senha,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $estado,
        $cep,
        $complemento
    ) {
        try {
            $this->conn->beginTransaction();
            $sqlEndereco = "INSERT INTO enderecos (logradouro, numero, bairro, cidade, estado, cep, complemento)
                        VALUES (:logradouro, :numero, :bairro, :cidade, :estado, :cep, :complemento)";
            $stmtEndereco = $this->conn->prepare($sqlEndereco);
            $stmtEndereco->bindParam(':logradouro', $logradouro);
            $stmtEndereco->bindParam(':numero', $numero);
            $stmtEndereco->bindParam(':cep', $cep);
            $stmtEndereco->bindParam(':complemento', $complemento);
            $stmtEndereco->bindParam(':bairro', $bairro);
            $stmtEndereco->bindParam(':cidade', $cidade);
            $stmtEndereco->bindParam(':estado', $estado);
            $stmtEndereco->execute();

            $enderecoId = $this->conn->lastInsertId();

            $sqlUsuario = "INSERT INTO usuarios (nome, cpf, telefone, email, senha, id_endereco, ativo, tipo_perfil)
                       VALUES (:nome, :cpf, :telefone, :email, :senha, :id_endereco, true, 'PESSOAL')";
            $stmtUsuario = $this->conn->prepare($sqlUsuario);
            $stmtUsuario->bindParam(':nome', $nome);
            $stmtUsuario->bindParam(':cpf', $cpf);
            $stmtUsuario->bindParam(':telefone', $telefone);
            $stmtUsuario->bindParam(':email', $email);
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
            $stmtUsuario->bindParam(':senha', $senhaHash);
            $stmtUsuario->bindParam(':id_endereco', $enderecoId);

            $stmtUsuario->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Erro ao registrar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function registrarUsuarioSemEndereco($nome, $cpf, $telefone, $email, $senha)
    {
        try {
            $query = "INSERT INTO usuarios (nome, cpf, telefone, email, senha, tipo_perfil) VALUES (:nome, :cpf, :telefone, :email, :senha, :tipo_perfil)";
            $stmt = $this->conn->prepare($query);

            // utilizar dentro do execulte no lugar de bindparam
            $stmt->execute([
                ':nome' => $nome,
                ':cpf' => $cpf,
                ':telefone' => $telefone,
                ':email' => $email,
                ':senha' => $senha,
                ':tipo_perfil' => 'Usuario',
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao registrar usuário: " . $e->getMessage());
            return false;
        }
    }

    public function findUsuarioByEmail($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findUsuarioByCpf($cpf)
    {
        $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findUsuarioById($id)
    {
        $sql = "SELECT * FROM usuarios U JOIN enderecos E ON U.id_endereco = E.id WHERE U.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findDonationHistoryBySearch($userid, $nome_ong){
    $sql = "SELECT D.dt_doacao, O.razao_social, D.valor 
            FROM doacoes D
            JOIN ongs O ON O.id = D.id_ong
            JOIN usuarios U ON U.id = D.id_usuario
            WHERE U.id = :userid AND O.razao_social LIKE :nome_ong";
    
    $stmt = $this->conn->prepare($sql);
    
    $nome_ong = '%' . $nome_ong . '%';
    $stmt->bindParam(':nome_ong', $nome_ong);
    $stmt->bindParam(':userid', $userid);
    
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOngVolunteerBySearch($userid, $nome_ong)
    {
        $sql = "SELECT V.dt_associacao, V.status_validacao, V.id_ong, O.razao_social 
                FROM voluntarios V
                JOIN ongs O ON O.id = V.id_ong
                WHERE V.id_usuario = :userid AND O.razao_social LIKE :nome_ong";

        $stmt = $this->conn->prepare($sql);

        $nome_ong = '%' . $nome_ong . '%';
        $stmt->bindParam(':nome_ong', $nome_ong);
        $stmt->bindParam(':userid', $userid);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroOngVolunteerByData($userid, $data_inicio = NULL, $data_fim = NULL)
    {
        if (!is_null($data_inicio) && !is_null($data_fim)) {
            $sql = "SELECT V.dt_associacao, V.status_validacao, V.id_ong, O.razao_social
                FROM voluntarios V
                JOIN ongs O ON O.id = V.id_ong
                WHERE V.dt_associacao BETWEEN :data_inicio AND :data_fim
                  AND V.id_usuario = :userid
                ORDER BY V.dt_associacao DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        } else {
            $sql = "SELECT V.dt_associacao, V.status_validacao, V.id_ong, O.razao_social
                FROM voluntarios V
                JOIN ongs O ON O.id = V.id_ong
                WHERE V.id_usuario = :userid
                ORDER BY V.dt_associacao DESC";

            $stmt = $this->conn->prepare($sql);
        }

        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroOngDonationHistoryByData($userid, $data_inicio = NULL, $data_fim = NULL)
    {
        if (!is_null($data_inicio) && !is_null($data_fim)) {
            $sql = "SELECT D.valor, D.anonimo, D.dt_doacao, O.razao_social, O.id as id_ong
                FROM doacoes D
                JOIN ongs O ON D.id_ong = O.id
                WHERE D.dt_doacao BETWEEN :data_inicio AND :data_fim
                  AND D.id_usuario = :userid
                ORDER BY D.dt_doacao DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        } else {
            $sql = "SELECT D.valor, D.anonimo, D.dt_doacao, O.razao_social, O.id as id_ong
                FROM doacoes D
                JOIN ongs O ON D.id_ong = O.id
                WHERE D.id_usuario = :userid
                ORDER BY D.dt_doacao DESC";

            $stmt = $this->conn->prepare($sql);
        }

        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarUsuario($id, $nome, $telefone, $email, $cpf, $id_imagem_de_perfil = null)
    {
        try {
            // Verifica duplicidade de telefone
            $verificaTelefone = $this->conn->prepare("SELECT id FROM usuarios WHERE telefone = :telefone AND id != :id");
            $verificaTelefone->bindParam(':telefone', $telefone);
            $verificaTelefone->bindParam(':id', $id, PDO::PARAM_INT);
            $verificaTelefone->execute();
            if ($verificaTelefone->fetch())
                return 'telefone_duplicado';

            // Monta query
            $sql = "UPDATE usuarios 
                    SET nome = :nome, 
                        telefone = :telefone, 
                        email = :email, 
                        cpf = :cpf";

            if (!empty($id_imagem_de_perfil)) {
                $sql .= ", id_imagem_de_perfil = :id_imagem_de_perfil";
            }

            $sql .= " WHERE id = :id";

            // Prepara e executa
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpf', $cpf);
            if (!empty($id_imagem_de_perfil)) {
                $stmt->bindParam(':id_imagem_de_perfil', $id_imagem_de_perfil, PDO::PARAM_INT);
            }
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }


    public function buscarUsuarioId($idUsuario)
    {
        $sql = "SELECT * 
                FROM usuarios u
                LEFT JOIN imagens i ON u.id_imagem_de_perfil = i.id
                WHERE u.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editarUsuarioImagem($id, $id_imagem_de_perfil)
    {
        try {
            $sql = "UPDATE usuarios SET id_imagem_de_perfil = :id_imagem_de_perfil WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_imagem_de_perfil', $id_imagem_de_perfil, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\Throwable $th) {
            return false;
        }
    }
}
