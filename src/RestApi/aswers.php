<?php

require_once("../API/Api.php");
if(!empty($_GET)){
    echo(Api::call("GetQuestions"));
}
if(!empty($_POST)){
    echo(Api::call("GetQuestions",$_POST));
}