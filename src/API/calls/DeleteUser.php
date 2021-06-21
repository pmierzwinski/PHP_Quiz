<?php

require_once(__DIR__ . "/../DataBase.php");

class DeleteUser extends DataBase
{

    private $dbTableName = "users";

    private $data;
    /**
     * @var string
     */
    private $userId;


    public function initContent($data = [])
    {
        try
        {
            $this->data = $data;
            $this->setData($data);

            $sql = "DELETE FROM `".$this->dbTableName."` WHERE id = ".$this->userId;
            $polecenie = $this->connect()->query($sql);


            return json_encode(['result' => 'success']);

        }catch (\Exception $e) {
            return json_encode(['result' => 'error','message' => $e->getMessage()]);
        }
    }

    private function setData($data){
        if(empty($data["userId"])){$this->userId = "";}
        else{$this->userId = $data["userId"];}
    }

}