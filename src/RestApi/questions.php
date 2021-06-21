<?php

require_once("../API/Api.php");
if(!empty($_GET)){
    echo(Api::call("GetQuestions"));
    die();
}
if(!empty($_POST)){

    try{
        echo(Api::call(CreateQuestion::class,$_POST));
        die();
    }catch (Exception $e){
        echo($e->getMessage());
        die();
    }
}
