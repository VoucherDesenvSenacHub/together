<?php 

require_once '../config/database.php';

class DoacaoModel {
    private $conn;
    private float $_valor;
    private bool $_anonimo;
    private DateTime $_dtDoacao;
    private int $_idUsuario;
    private int $_idOng;

    public function __construct(float $valor, bool $anonimo, DateTime $dtDoacao, int $idUsuario, int $idOng) {
        $database = new Database();
        $this->conn = $database->conectar();
        $this->_valor = $valor;
        $this->_anonimo = $anonimo;
        $this->_dtDoacao = $dtDoacao;
        $this->_idUsuario = $idUsuario;
        $this->_idOng = $idOng;
    }

    // paginar
    public function BuscarDoacoesPorID(int $idUsuario){
        $query = "SELECT CONVERT(varchar ,D.dtDoacao, 103), O.razao_social, D.valor FROM doacoes D JOIN ongs O ON O.id = D.id_ong JOIN usuarios U ON U.id = D.id_usuario WHERE U.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $idUsuario);

        return $stmt->execute();
    }
}