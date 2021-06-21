<?php

require_once(__DIR__ . "/../DataBase.php");

class DeleteQuestion extends DataBase
{

    private $dbTableName = "questions";

    private $data;
    /**
     * @var string
     */
    private $questionId;


    public function initContent($data = [])
    {
        try
        {
            $this->data = $data;
            $this->setData($data);

            $sql = "DELETE FROM `".$this->dbTableName."` WHERE id = ".$this->questionId;
            $polecenie = $this->connect()->query($sql);


            return json_encode(['result' => 'success']);

        }catch (\Exception $e) {
            return json_encode(['result' => 'error','message' => $e->getMessage()]);
        }
    }

    private function setData($data){
        if(empty($data["questionId"])){$this->questionId = "";}
        else{$this->questionId = $data["questionId"];}
    }

}