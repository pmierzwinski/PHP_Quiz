<?php

require_once(__DIR__ . "/../DataBase.php");

class CreateResult extends DataBase
{

    private $dbTableName = "results";

    private $data;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $result;


    public function initContent($data = [])
    {
        $this->data = $data;
        $this->setData($data);

        $sql = "INSERT INTO ".$this->dbTableName." (`user`, `result`) VALUES ('".$this->user."','".$this->result."');";

        $polecenie = $this->connect()->query($sql);

        if($polecenie){
            return json_encode(['result' => 'success']);
        }else{
            return json_encode(['result' => 'error']);
        }
    }

    private function setData($data){
        if(empty($data["user"])){$this->user = "";}
        else{$this->user = $data["user"];}
        if(empty($data["result"])){$this->result = "";}
        else{$this->result = $data["result"];}
    }

}