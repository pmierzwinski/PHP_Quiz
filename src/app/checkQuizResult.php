<?php

require_once("../API/Api.php");
require_once("../Helpers/Provider.php");

$test = Api::call('GetResults',['user' => 123]);

$answers = Provider::getCorrectAnswers();
$points = 0;


session_start();
$user = $_SESSION['user'];
$all = $_POST['all'];
unset($_POST['all']);

foreach ($_POST as $post)
{
    if(in_array($post,$answers))
    {
        $points++;
    }
}

Api::call('CreateResult',['user' => $user,'result' => substr((($points/$all)*100)."",0,5)."%"]);

header('Location: ' . '../index.php');
die();