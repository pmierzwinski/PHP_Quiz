<?php

require_once(__DIR__ . "/../DataBase.php");

class CreateQuestion extends DataBase
{

    private $dbTableName = "questions";

    private $data;
    /**
     * @var string
     */
    private $question;


    public function initContent($data = [])
    {
        try
        {
            $this->data = $data;
            $this->setData($data);

            $sql = "INSERT INTO ".$this->dbTableName." (`question`) VALUES ('".$this->question."')";
            $polecenie = $this->connect()->query($sql);

            return json_encode(['id' => $this->conn->lastInsertId()]);

        }catch (\Exception $e) {
            return json_encode(['result' => 'error','message' => $e->getMessage()]);
        }
    }

    private function setData($data){
        if(empty($data["question"])){$this->question = "";}
        else{$this->question = $data["question"];}
    }

}