<?php 
require_once __DIR__. "/../config/database.php";

class BuscarOngsEmAnaliseModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // Buscar ongs com filtros
    // public function BuscarOngsFiltrado(?array $colunas =[],?int $id = null, ?int $id_usuario = null, ?string $razao_social = "", ){
    //     $filtros = [];
    //     if($colunas->Count() < 1){
    //         $query = "SELECT * FROM ongs";
    //     }else{
    //         $query = "SELECT " . implode(",", $colunas) . "FROM ongs";
    //     }
    //     if($id != null){
    //         $filtros["id"] = $id;            
    //     }
    //     if($razao_social != ""){
    //         $filtros["razao_social"] = $razao_social;
    //     }
    //     if($id_usuario != null){
    //         $filtros["id_usuario"] = $id_usuario;
    //     }
    //     if($cnpj != ""){
    //         $filtros["cnpj"] = $cnpj;
    //     }
    //     if($dt_fundacao != null){
    //         $filtros["dt_fundacao"] = $dt_fundacao;
    //     }
    //     if($dt_criacao != null){
    //         $filtros["dt_criacao"] = $dt_criacao;
    //     }
    //     switch($status_validacao){
    //         case "":
    //             break;
    //         case "aprovado":
    //             $filtros["status_validacao"] = true;
    //             break;
    //         case "emAnalisa":
    //             $filtros["status_validacao"] = null;
    //             break;
    //         case "reprovado":
    //             $filtros["status_validacao"] = false;
    //             break;
    //         };
    //     switch($ativo){
    //         case "":
    //             break;
    //         case "ativo":
    //             $filtros["ativo"] = true;
    //             break;
    //         case "inativo":
    //             $filtros["ativo"] = false;
    //     }
    //     if()
             


    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function BuscarOngsEmAnalise(){
        $query = "SELECT dt_criacao, razao_social, IFNULL(status_validacao, \"Em análise...\") WHERE status_validacao IS NULL;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
