<?php
require_once("../API/Api.php");

$response = API::call('DeleteUser',$_POST);
$response = json_decode($response);

header('Location: '.'../index.php');
die();