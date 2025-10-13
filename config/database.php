<?php

class Database
{
    // 10.78.0.215
    private $host = "localhost";
    private $port = "3306";
    private $dbName = "together";
    private $user = "root";
    // 12345678
    private $password = "";


    public function conectar()
    {
        $url = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName";
        $conn = new PDO($url, $this->user, $this->password);

        return $conn;
    }
}


?>