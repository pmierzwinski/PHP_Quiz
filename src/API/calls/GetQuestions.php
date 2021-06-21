<?php

require_once(__DIR__ . "/../DataBase.php");

class GetQuestions extends DataBase
{

    public function initContent($data = [])
    {

        $sql = "SELECT * FROM questions";
        $polecenie = $this->connect()->query($sql);

        $dane = $polecenie->fetchAll();
        return (json_encode($dane));
    }

}