<?php

class DataBase
{
    private $host;

    private $user;

    private $pass;

    private $dbName;

    private $data;

    public $conn;

    public function __construct(){
        $this->setData();
        $this->connect();
    }

    function connect(){
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }

        return $this->conn;
    }

    private function setData(){
        $this->data = json_decode($this->file(),true);
        if(empty($this->data["host"])){$this->host = "";}
        else{$this->host = $this->data["host"];}
        if(empty($this->data["user"])){$this->user = "";}
        else{$this->user = $this->data["user"];}
        if(empty($this->data["pass"])){$this->pass = "";}
        else{$this->pass = $this->data["pass"];}
        if(empty($this->data["dbName"])){$this->dbName = "";}
        else{$this->dbName = $this->data["dbName"];}
    }

    function file() {
        $filePath = __DIR__ ."/../configs/configs.txt";
        try{
            $file = @fopen($filePath, "r");
        }catch (Exception $e){
            echo($e);
            die();
        }
        if(!$file){
            echo("Brak pliku configs w ".$filePath);
            die();
        }
        $fileSize = filesize($filePath);
        $fileText = fread($file, $fileSize);
        fclose($file);
        return $fileText;
    }
}