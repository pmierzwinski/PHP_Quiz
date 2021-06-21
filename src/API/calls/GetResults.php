<?php

require_once(__DIR__ . "/../DataBase.php");

class GetResults extends DataBase
{
    public function initContent($data = [])
    {
        if(!empty($data))
        {

            $statement = '`'.array_key_first($data).'` = "'.$data[array_key_first($data)].'"';
            unset($data[array_key_first($data)]);

            if(count($data) > 1)
            {
                foreach ($data as $key => $value)
                {
                    $statement .= ' AND `'.$key.'` = "'.$value.'"';
                }
            }
            $sql = 'SELECT * FROM `results` WHERE '.$statement;


        }else{
            $sql = "SELECT * FROM results";
        }

        $polecenie = $this->connect()->query($sql);

        $dane = $polecenie->fetchAll();
        return (json_encode($dane));
    }

}