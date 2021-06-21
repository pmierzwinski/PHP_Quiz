<?php

require_once(__DIR__ . "/../DataBase.php");

class CreateAnswers extends DataBase
{

    private $dbTableName = "answers";

    private $data;
    /**
     * @var string
     */
    private $questionId;
    /**
     * @var string
     */
    private $answer1;
    /**
     * @var string
     */
    private $answer2;
    /**
     * @var string
     */
    private $answer3;
    /**
     * @var string
     */
    private $answer4;
    private $answer1value;
    private $answer2value;
    private $answer3value;
    private $answer4value;

    public function initContent($data = [])
    {
        $this->data = $data;
        $this->setData($data);

        $sql = "INSERT INTO ".$this->dbTableName." (`answer`, `question`, `correct`) VALUES ('".$this->answer1."','".$this->questionId."','".$this->answer1value."');";
        $sql .= "INSERT INTO ".$this->dbTableName." (`answer`, `question`, `correct`) VALUES ('".$this->answer2."','".$this->questionId."','".$this->answer2value."');";
        $sql .= "INSERT INTO ".$this->dbTableName." (`answer`, `question`, `correct`) VALUES ('".$this->answer3."','".$this->questionId."','".$this->answer3value."');";
        $sql .= "INSERT INTO ".$this->dbTableName." (`answer`, `question`, `correct`) VALUES ('".$this->answer4."','".$this->questionId."','".$this->answer4value."');";

        $polecenie = $this->connect()->query($sql);

        if($polecenie){
            return json_encode(['result' => 'success']);
        }else{
            return json_encode(['result' => 'error']);
        }
    }

    private function setData($data){
        if(empty($data["questionId"])){$this->questionId = "";}
        else{$this->questionId = $data["questionId"];}

        if(empty($data["answer1"])){$this->answer1 = "";}
        else{$this->answer1 = $data["answer1"];}


        if(empty($data["answer2"])){$this->answer2 = "";}
        else{$this->answer2 = $data["answer2"];}


        if(empty($data["answer3"])){$this->answer3 = "";}
        else{$this->answer3 = $data["answer3"];}


        if(empty($data["answer4"])){$this->answer4 = "";}
        else{$this->answer4 = $data["answer4"];}

        $this->answer1value = "0";
        $this->answer1value = "0";
        $this->answer1value = "0";
        $this->answer1value = "0";
        switch ($data['answer'])
        {
            case 1:
                $this->answer1value = "1";
                break;
            case 2:
                $this->answer2value = "1";
                break;
            case 3:
                $this->answer3value = "1";
                break;
            case 4:
                $this->answer4value = "1";
                break;
        }

    }

}