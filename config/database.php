<?php


class Database
{
    private $host = "10.78.0.215";
    private $port = "3306";
    private $dbName = "together";
    private $user = "root";
    private $password = "12345678";



    public function conectar()
    {
        $url = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName";
        $conn = new PDO($url, $this->user, $this->password);

        return $conn;
    }
}


?>