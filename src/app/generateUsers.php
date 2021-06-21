<?php
require_once("../API/Api.php");
require_once("../Helpers/Provider.php");

$indexes = explode("\n",$_POST['indexes']);

foreach ($indexes as $index)
{
    $password = Provider::randomPassword();
    $response = API::call('CreateUser',['login' => $index, 'password' => $password]);
    $response = json_decode($response);
}


header('Location: '.'../index.php');
die();