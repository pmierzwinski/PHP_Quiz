<?php
require_once("../API/Api.php");

$response = API::call('DeleteQuestion',$_POST);
$response = json_decode($response);

$response = API::call('DeleteAnswers',$_POST);
$response = json_decode($response);

header('Location: '.'../index.php');
die();