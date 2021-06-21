<?php

class Api
{

    public  function __construct(){

    }

    public static function call($name,$data = []){

        require_once(__DIR__ ."/calls/".$name.".php");

        $class = new $name();

        return $class->initContent($data);
    }

}