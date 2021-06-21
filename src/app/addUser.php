<?php
require_once("../API/Api.php");

$response= API::call('GetUsers',['login' => $_POST['login']]);

if(empty(json_decode($response)))
{
    $response = API::call('CreateUser',$_POST);
}else{
    $response = json_encode(['result' => 'error','message' => "User already exist!"]);
}

header('Location: '.'../index.php');
die();