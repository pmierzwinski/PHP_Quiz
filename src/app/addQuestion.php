<?php
require_once("../API/Api.php");

$response = API::call('CreateQuestion',$_POST);

$questionId = json_decode($response)->id;
$content = array_merge($_POST,['questionId' => $questionId]);

$response = API::call('CreateAnswers',$content);
$response = json_decode($response);

header('Location: '.'../index.php');
die();