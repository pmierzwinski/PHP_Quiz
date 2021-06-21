<?php

require_once(__DIR__ . "/../DataBase.php");

class CreateUser extends DataBase
{

    private $dbTableName = "users";

    private $data;
    private $login;
    private $password;


    public function initContent($data = [])
    {
        try
        {
            $this->data = $data;
            $this->setData($data);


            $sql = "INSERT INTO ".$this->dbTableName." (`login`, `password`) VALUES ('".$this->login."','".$this->password."')";
            $polecenie = $this->connect()->query($sql);

            return json_encode(['id' => $this->conn->lastInsertId()]);

        }catch (\Exception $e) {
            return json_encode(['result' => 'error','message' => $e->getMessage()]);
        }
    }

    private function setData($data){
        if(empty($data["login"])){$this->login = "";}
        else{$this->login = $data["login"];}
        if(empty($data["password"])){$this->password = "";}
        else{$this->password = $data["password"];}
    }

}