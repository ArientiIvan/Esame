<?php

class Database{
    protected $servername = "127.0.0.1";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "ssn";
    public $connection;

    public function __construct(){
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function query($query){
        $result = $this->connection->query($query) or die($this->connection->error);
        return $result->fetch_assoc();
    }

    public function insert($query){
        return $this->connection->query($query);
    }
}