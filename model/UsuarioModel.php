<?php 

require_once __DIR__ . '/../config/database.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function registrarUsuario($nome, $cpf, $telefone, $email, $senha ) {
        $sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senhas) VALUES (
            :nome, :cpf, :telefone, :email, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cpf', $telefone);
        $stmt->bindParam(':cpf', $email);
        $stmt->bindParam(':senha', var: password_hash($senha, PASSWORD_BCRYPT));
        
        return $stmt->execute();
    }

    public function findUsuarioByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function editarUsuario($id, $nome, $telefone, $email, $cpf, $tipo_perfil, $id_imagem_de_perfil) {
        $verificaCpf = $this->conn->prepare("SELECT id FROM usuarios WHERE cpf = :cpf AND id != :id");
        $verificaCpf->bindParam(':cpf', $cpf);
        $verificaCpf->bindParam(':id', $id, PDO::PARAM_INT);
        $verificaCpf->execute();
    
        if ($verificaCpf->fetch()) {
            return 'cpf_duplicado';
        }

        $verificaTelefone = $this->conn->prepare("SELECT id FROM usuarios WHERE telefone = :telefone AND id != :id");
        $verificaTelefone->bindParam(':telefone', $telefone);
        $verificaTelefone->bindParam(':id', $id, PDO::PARAM_INT);
        $verificaTelefone->execute();

        if ($verificaTelefone->fetch()) {
            return 'telfone_duplicado';
        }

        $sql = "UPDATE usuarios 
                SET nome = :nome, 
                    telefone = :telefone, 
                    email = :email, 
                    cpf = :cpf, 
                    tipo_perfil = :tipo_perfil,
                    id_imagem_de_perfil = :id_imagem_de_perfil
                WHERE id = :id";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':tipo_perfil', $tipo_perfil);
        $stmt->bindParam(':id_imagem_de_perfil', $id_imagem_de_perfil, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
    public function buscarUsuarioId($idUsuario) {
        $sql = "SELECT * 
                FROM usuarios u
                LEFT JOIN imagens i ON u.id_imagem_de_perfil = i.id
                WHERE u.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirImagem($caminhoNoBanco, $nomeFinal, $nomeOriginal) {
        $sql = "INSERT
                INTO imagens (nome_enviado, nome_original, caminho)
                VALUES (:nome_enviado, :nome_original, :caminho)";
        $stmt = $this->conn->prepare($sql);
        $executou = $stmt->execute([
            ':nome_enviado' => $nomeFinal,
            ':nome_original' => $nomeOriginal,
            ':caminho' => $caminhoNoBanco
        ]);
    
        $id_imagem_de_perfil = $this->conn->lastInsertId();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>