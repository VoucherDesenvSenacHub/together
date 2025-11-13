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
        $sql = "SELECT id, razao_social, dt_criacao, status_validacao FROM ongs WHERE razao_social LIKE :nome_ong";
        $stmt = $this->conn->prepare($sql);
        $nome_ong = '%' . $nome_ong . '%';
        $stmt->bindParam(':nome_ong', $nome_ong);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrarVoluntario($nome_usuario_voluntario, $id_ong, $data_inicio = null, $data_fim = null)
    {
        $sql = "SELECT U.id, V.dt_associacao, U.nome
            FROM voluntarios V
            JOIN usuarios U ON U.id = V.id_usuario
            JOIN ongs O ON O.id = V.id_ong
            WHERE V.status_validacao = 'aprovado'
            AND O.id = :id_ong";

        $params = [
            ':id_ong' => $id_ong
        ];

        if (!empty($nome_usuario_voluntario)) {
            $sql .= " AND U.nome LIKE :nome_usuario_voluntario";
            $params[':nome_usuario_voluntario'] = '%' . $nome_usuario_voluntario . '%';
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $sql .= " AND V.dt_associacao BETWEEN :data_inicio AND :data_fim";
            $params[':data_inicio'] = $data_inicio;
            $params[':data_fim'] = $data_fim;
        }

        $sql .= " ORDER BY V.dt_associacao DESC";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

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

    public function buscarDoacoes($id_ong, $nome_doador = null, $data_inicio = null, $data_fim = null)
    {
        $sql = "SELECT D.dt_doacao, U.nome, D.valor
            FROM doacoes D
            JOIN usuarios U ON U.id = D.id_usuario
            WHERE D.id_ong = :id_ong";

        // Adiciona filtros opcionais dinamicamente
        if (!empty($nome_doador)) {
            $sql .= " AND U.nome LIKE :nome_doador";
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $sql .= " AND D.dt_doacao BETWEEN :data_inicio AND :data_fim";
        }

        $sql .= " ORDER BY D.dt_doacao DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_ong', $id_ong);

        if (!empty($nome_doador)) {
            $nome_doador = '%' . $nome_doador . '%';
            $stmt->bindParam(':nome_doador', $nome_doador);
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroDataHoraVoluntarios($id_ong, $data_inicio = NULL, $data_fim = NULL)
    {
        if (is_null($data_inicio) || is_null($data_fim)) {
            $sql = "SELECT V.dt_associacao, U.nome, U.id
                          FROM voluntarios V 
                          JOIN usuarios U ON U.id = V.id_usuario 
                          WHERE V.id_ong = :id_ong
                          ORDER BY V.dt_associacao DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_ong', $id_ong);
        } else {
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

    public function editarPostagemDaOng($id_postagem, $titulo, $descricao, $link, $id_imagem = null)
    {
        try {
            $q = "UPDATE postagens SET titulo = :titulo, descricao = :descricao, link = :link, id_imagem = :id_imagem WHERE id = :id_postagem";
            $stmt = $this->conn->prepare($q);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':id_imagem', $id_imagem);
            $stmt->bindParam(':id_postagem', $id_postagem);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function verificaExisteDadosOng($cnpj, $razao_social, $telefone)
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ongs WHERE cnpj = :cnpj OR razao_social = :razao_social OR telefone = :telefone");

            $stmt->execute([
                ':cnpj' => $cnpj,
                ':razao_social' => $razao_social,
                ':telefone' => $telefone,
            ]);

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $existe = $res['total'] > 0;

            return [
                'response' => true,
                'existe' => $existe,
                'total_encontrados' => $res['total']
            ];
        } catch (Exception $e) {
            return [
                'response' => false,
                'erro' => $e->getMessage()
            ];
        }
    }

    public function verificarUsuarioTemOng($id)
    {
        $query = "SELECT o.id as id_ong, o.razao_social
              FROM usuarios u
              INNER JOIN ongs o ON o.id_usuario = u.id
              WHERE u.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // retorna array ou false
    }

    public function buscarOngPorId($id)
    {
        $query = "SELECT 
                o.id, 
                o.razao_social AS nome, 
                o.telefone, 
                o.cnpj, 
                o.dt_criacao AS data_fundacao,
                u.email,
                e.cep, 
                e.logradouro, 
                e.complemento, 
                e.estado,
                e.bairro, 
                e.numero, 
                e.cidade,
                o.id_imagem_de_perfil,   
                i.caminho AS imagem      
            FROM 
                ongs o
            INNER JOIN 
                enderecos e ON o.id_endereco = e.id
            INNER JOIN 
                usuarios u ON o.id_usuario = u.id
            LEFT JOIN 
                imagens i ON o.id_imagem_de_perfil = i.id
            WHERE 
                o.id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verificaExisteCampo($campo, $valor, $id): bool
    {
        $query = "SELECT COUNT(*) as total 
              FROM ongs 
              WHERE {$campo} = :valor 
              AND id != :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] > 0;
    }

    public function atualizarOng($id, $nome, $telefone, $cnpj, $data_fundacao, $email, $cep, $logradouro, $complemento, $numero, $estado, $cidade, $idImagem = null)
    {
        try {
            $this->conn->beginTransaction();

            $queryOng = "UPDATE ongs
            SET razao_social = :nome,
                telefone  = :telefone,
                cnpj = :cnpj,
                dt_criacao = :dt_criacao"
                . ($idImagem ? ", id_imagem_de_perfil = :idImagem" : "") . "
            WHERE id = :id";

            $stmtOng = $this->conn->prepare($queryOng);
            $stmtOng->bindParam(':nome', $nome);
            $stmtOng->bindParam(':telefone', $telefone);
            $stmtOng->bindParam(':cnpj', $cnpj);
            $stmtOng->bindParam(':dt_criacao', $data_fundacao);
            if ($idImagem) {
                $stmtOng->bindParam(':idImagem', $idImagem, PDO::PARAM_INT);
            }
            $stmtOng->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtOng->execute();

            // Atualiza usuário
            $queryUsuario = "UPDATE usuarios
            SET email = :email
            WHERE id = (SELECT id_usuario FROM ongs WHERE id = :id)";
            $stmtUsuario = $this->conn->prepare($queryUsuario);
            $stmtUsuario->bindParam(':email', $email);
            $stmtUsuario->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtUsuario->execute();

            // Atualiza endereço
            $queryEndereco = "UPDATE enderecos 
            SET cep = :cep, 
                logradouro = :logradouro, 
                complemento = :complemento, 
                numero = :numero, 
                estado = :estado,
                cidade = :cidade
            WHERE id = (SELECT id_endereco FROM ongs WHERE id = :id)";
            $stmtEndereco = $this->conn->prepare($queryEndereco);
            $stmtEndereco->bindParam(':cep', $cep);
            $stmtEndereco->bindParam(':logradouro', $logradouro);
            $stmtEndereco->bindParam(':complemento', $complemento);
            $stmtEndereco->bindParam(':numero', $numero);
            $stmtEndereco->bindParam(':estado', $estado);
            $stmtEndereco->bindParam(':cidade', $cidade);
            $stmtEndereco->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtEndereco->execute();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            throw new Exception("Erro ao atualizar ONG: " . $e->getMessage());
        }
    }

    public function atualizarImagemPerfil($idOng, $idImagem)
    {
        try {
            $query = "UPDATE ongs SET id_imagem_de_perfil = :id_imagem WHERE id = :id_ong";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_imagem', $idImagem, PDO::PARAM_INT);
            $stmt->bindParam(':id_ong', $idOng, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar imagem de perfil: " . $e->getMessage());
        }
    }

    public function buscarTodasOngs($idCategorias = null)
    {
        $query = "SELECT o.id, o.razao_social, i.caminho, c.nome AS categoria, p.descricao
              FROM ongs o
              INNER JOIN categorias_ongs c ON c.id = o.id_categoria
              INNER JOIN imagens i ON i.id = o.id_imagem_de_perfil
              INNER JOIN paginas p ON p.id_ong = o.id";

        $params = [];

        if (!empty($idCategorias)) {
            // Gera placeholders dinâmicos (:id0, :id1, :id2...)
            $placeholders = [];
            foreach ($idCategorias as $key => $id) {
                $ph = ":id$key";
                $placeholders[] = $ph;
                $params[$ph] = $id;
            }
            $query .= " WHERE c.id IN (" . implode(",", $placeholders) . ")";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrarVoluntarioPendente($idOng, $nome_voluntario = '', $data_inicio = null, $data_fim = null)
    {
        $sql = "SELECT
                V.id AS id_voluntario,
                U.nome,
                V.id_usuario AS id_usuario_voluntario,
                V.status_validacao,
                V.dt_associacao,
                O.id AS id_ong
            FROM
                usuarios U
            INNER JOIN
                voluntarios V ON V.id_usuario = U.id
            INNER JOIN
                ongs O ON O.id = V.id_ong
            WHERE
                O.id = :idOng
            AND V.status_validacao = 'pendente'";

        $params = [':idOng' => $idOng];

        if (!empty($nome_voluntario)) {
            $sql .= " AND U.nome LIKE :nome_voluntario";
            $params[':nome_voluntario'] = '%' . $nome_voluntario . '%';
        }

        if (!empty($data_inicio) && !empty($data_fim)) {
            $sql .= " AND V.dt_associacao BETWEEN :data_inicio AND :data_fim";
            $params[':data_inicio'] = $data_inicio;
            $params[':data_fim'] = $data_fim;
        }

        $sql .= " ORDER BY U.dt_criacao DESC";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarVoluntariosPendentes($idOng)
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM usuarios U INNER JOIN voluntarios V ON V.id_usuario = U.id INNER JOIN ongs O ON O.id = V.id_ong WHERE O.id = :idOng AND V.status_validacao = 'pendente'";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':idOng', $idOng, PDO::PARAM_INT);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $resultado['total'];
        } catch (Exception $e) {
            return 0;
        }
    }

    public function buscarVoluntarioDaOng($idOng, $limite, $offset)
    {
        try {
            $sql = "SELECT
                V.id AS id_voluntario,
                U.nome,
                V.id_usuario AS id_usuario_voluntario,
                V.status_validacao,
                V.dt_associacao,
                O.id AS id_ong
            FROM
                usuarios U
            INNER JOIN
                voluntarios V ON V.id_usuario = U.id
            INNER JOIN
                ongs O ON O.id = V.id_ong
            WHERE
                O.id = :idOng
            AND
                V.status_validacao = 'pendente'
            ORDER BY
                V.dt_associacao ASC
            LIMIT :limite OFFSET :offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':idOng', $idOng, PDO::PARAM_INT);
            $stmt->bindValue(':limite', (int) $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return 0;
        }
    }

    public function pegarImagemPerfilPaginaOng($id_ong)
    {
        $query = "SELECT i.caminho 
              FROM paginas p
              LEFT JOIN imagens i ON p.id_imagem = i.id
              WHERE p.id_ong = :id_ong";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_ong', $id_ong);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado ? $resultado['caminho'] : null;
    }

    public function mostrarInformacoesPaginaOng($id)
    {
        $query = "SELECT o.razao_social as titulo, 
                p.subtitulo, 
                p.descricao, 
                p.facebook, 
                p.instagram,
                p.twitter 
                FROM paginas p 
                JOIN  ongs o
                ON o.id = p.id_ong
                WHERE p.id_ong = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $pagina = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pagina) {
            // Extrai apenas o nome do perfil das URLs
            $pagina['facebook_nome'] = $this->extrairNomePerfil($pagina['facebook']);
            $pagina['instagram_nome'] = $this->extrairNomePerfil($pagina['instagram']);
            $pagina['twitter_nome'] = $this->extrairNomePerfil($pagina['twitter']);
        }

        return $pagina;
    }

    // Função auxiliar para pegar o último segmento da URL
    private function extrairNomePerfil($url)
    {
        if (!$url)
            return null;

        $parsed = parse_url($url);

        if (!isset($parsed['path']))
            return null;

        // Remove barra final e query string
        $path = rtrim($parsed['path'], '/');
        $path = explode('?', $path)[0];

        // Pega apenas o último segmento
        $parts = explode('/', $path);
        $ultimo = end($parts);

        return $ultimo ?: null;
    }

    public function editarPaginaOng($id, $subtitulo, $descricao, $facebook, $instagram, $twitter, $id_imagem)
    {
        try {
            $query = "UPDATE paginas p SET p.subtitulo=:subtitulo, p.descricao=:descricao, p.facebook=:facebook, p.instagram=:instagram, p.twitter=:twitter, p.id_imagem=:id_imagem WHERE id=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':subtitulo', $subtitulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':facebook', $facebook);
            $stmt->bindParam(':instagram', $instagram);
            $stmt->bindParam(':twitter', $twitter);
            $stmt->bindParam(':id_imagem', $id_imagem);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Erro editarPaginaOng: " . $e->getMessage());
            return false;
        }
    }

    public function ongsEmDestaque($limite = 4)
    {
        try {
            $query = "
                SELECT 
                    o.id,
                    o.razao_social AS titulo_ong,
                    p.descricao AS descricao_ong,
                    i.caminho AS foto_ong,
                    COUNT(d.id) AS total_doacoes
                FROM ongs o
                LEFT JOIN doacoes d ON d.id_ong = o.id
                LEFT JOIN paginas p ON p.id_ong = o.id
                LEFT JOIN imagens i ON i.id = o.id_imagem_de_perfil
                WHERE o.ativo = TRUE 
                AND o.status_validacao = 'aprovado'
                GROUP BY o.id, o.razao_social, p.descricao, i.caminho
                ORDER BY total_doacoes DESC
                LIMIT :limite";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', (int) $limite, PDO::PARAM_INT);
            $stmt->execute();

            $ongs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // 🔹 Caso não tenha imagem, definir uma padrão
            foreach ($ongs as &$ong) {
                if (empty($ong['foto_ong'])) {
                    $ong['foto_ong'] = "/together/view/assests/images/Adm/adm-vision-ong.png";
                }
                if (empty($ong['descricao_ong'])) {
                    $ong['descricao_ong'] = "Descrição não disponível.";
                }
            }

            return $ongs;
        } catch (Exception $e) {
            throw new Exception("Erro ao trazer as ONGs em destaque: " . $e->getMessage());
        }
    }

    public function mostrarinformacoesPostagemOng($id_postagem)
    {
        $query = "SELECT titulo, descricao, link FROM postagens WHERE id=:id_postagem";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_postagem', $id_postagem);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarStatusVoluntario($id_voluntario, $status_validacao)
    {
        try {
            $query = "UPDATE voluntarios SET status_validacao = :status_validacao WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':id' => $id_voluntario,
                'status_validacao' => $status_validacao
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscarVoluntarioPorId($id_voluntario)
    {
        $query = "SELECT v.id, o.razao_social, u.nome, u.telefone, u.cpf, u.dt_nascimento, u.email, e.cep, e.cidade, e.estado, e.bairro, e.logradouro, e.numero, e.complemento, i.id as id_imagem FROM voluntarios v LEFT JOIN ongs o ON v.id_ong = o.id LEFT JOIN usuarios u ON v.id_usuario = u.id LEFT JOIN imagens i ON u.id_imagem_de_perfil = i.id LEFT JOIN enderecos e ON u.id_endereco = e.id WHERE v.id = :id_voluntario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_voluntario', $id_voluntario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarTodasDoacoesOng($id_ong, $limite, $offset)
    {
        $query = "SELECT d.dt_doacao, d.valor, d.anonimo, d.status, u.nome 
            FROM doacoes d 
            LEFT JOIN usuarios u ON d.id_usuario = u.id 
            WHERE d.status = 'APROVADO'
            AND d.id_ong = :id_ong 
            ORDER BY d.dt_doacao ASC 
            LIMIT :limite
            OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_ong', $id_ong, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int) $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarQuantidadeDeVoluntariosOngs($id_ong)
    {
        $query = "SELECT COUNT(*) AS total
            FROM voluntarios 
            WHERE status_validacao = 'aprovado' 
            AND ativo = 1
            AND id_ong = :id_ong";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_ong', $id_ong, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return isset($resultado['total']) ? (int) $resultado['total'] : 0;
    }

    public function buscarOngPorIdUsuario($id_usuario)
    {
        $query = "SELECT * FROM ongs WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
