<?php

require_once(__DIR__ . "/../DataBase.php");

class GetUsers extends DataBase
{

    public function initContent($data = [])
    {

        if(!empty($data))
        {

            if(preg_match('#[^0-9]#',$data[array_key_first($data)]))
            {
                $singleValue = '"'.$data[array_key_first($data)].'"';
            }else{
                $singleValue = $data[array_key_first($data)];
            }

            $statement = "`".array_key_first($data).'` = '.$singleValue;
            unset($data[array_key_first($data)]);


            if(count($data) > 1)
            {
                foreach ($data as $key => $value)
                {
                    if(preg_match('#[^0-9]#',$value))
                    {
                        $value = '"'.$value.'"';
                    }

                    $statement .= " AND `".$key.'` = '.$value;
                }
            }
            $sql = "SELECT * FROM `users` WHERE ".$statement;


        }else{
            $sql = "SELECT * FROM users";
        }

        $polecenie = $this->connect()->query($sql);

        $dane = $polecenie->fetchAll();
        return (json_encode($dane));
    }

}