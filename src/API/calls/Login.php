<?php

require_once(__DIR__ . "/../DataBase.php");

class Login extends DataBase
{

    private $dbTableName = "users";

    private $login;

    private $password;

    private $data;

    public function initContent($data = [])
    {
        $this->data = $data;
        $this->setData($data);

        $sql = "SELECT `login` FROM " . $this->dbTableName . ' WHERE `login` = '.$this->login.' AND `password` = '.$this->password.' ORDER BY `login` ASC LIMIT 1';

        $polecenie = $this->connect()->query($sql);

        $result = $polecenie->fetchAll();

        if(!empty($result[array_key_first($result)]['login']))
        {
            return json_encode($result[array_key_first($result)]['login']);
        }else{
            return json_encode($result[array_key_first($result)]);
        }

    }

    private function setData($data){
        if(empty($data["login"])){$this->login = "";}
        else{$this->login = $data["login"];}

        if(preg_match('#[^0-9]#',$this->login))
        {
            $this->login = '"'.$this->login.'"';
        }

        if(empty($data["password"])){$this->password = "";}
        else{$this->password = $data["password"];}

        if(preg_match('#[^0-9]#',$this->password))
        {
            $this->password = '"'.$this->password.'"';
        }
    }

}