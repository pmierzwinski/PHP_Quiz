<?php
require_once("../API/Api.php");

session_start();

if($_POST['login']){
    $response = API::call('Login',$_POST);
    $user = json_decode($response);
    if(!empty($user))
    {
        $_SESSION['user'] = $user;
    }
}

if($_GET['logout']){
    $_SESSION['user'] = '';
}

header('Location: '.'../index.php');
die();