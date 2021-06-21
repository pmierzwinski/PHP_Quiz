<?php

require_once("Helpers/Html.php");

$login[] = Html::createH1("Logowanie:  ")."<br>";

$login[] = Html::createLabel('loginLab',"Login:  ");
$login[] = Html::createInput('login','login','','',"margin-left:1.5%")."<br>".'<br>';

$login[] = Html::createLabel('passLab',"Hasło:  ");
$login[] = Html::createInput('password','password','password','',"margin-left:1.45%").'<br>';

$loginForm = Html::createForm($login,'POST','app/login.php','Zaloguj');

return $loginForm;
