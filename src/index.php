<?php
session_start();

require('UI/Manager.php');
require_once("API/Api.php");

if(empty($_SESSION['user'])){
    $html = manager::getHtml('login','');
    echo $html;
    die();
}
if($_SESSION['user'] == 'admin'){
    $html = manager::getHtml('admin');
    echo $html;
    die();
}

$result = json_decode(Api::call('GetResults',['user' => $_SESSION['user']]));
if(!empty($result)){
    $html = manager::setHtml('<div><H1>Login:'.$result[0]->user.'  Wynik:'.$result[0]->result.'</H1></div>');
    echo $html;
    die();
}

$html = manager::getHtml('quiz');
echo $html;
die();

