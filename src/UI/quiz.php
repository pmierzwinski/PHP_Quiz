<?php


require_once("API/Api.php");
require_once("Helpers/Html.php");
require_once("Helpers/Provider.php");

$zadanie = [];

$questions = Provider::getQuestionsWithAnswers();
$licznik_pytan = 0;
foreach ($questions as $key => $question){
    $licznik_pytan++;

    $data = [];

    $data[] = Html::createHr();

    $numerPytania = Html::createH1("Pytanie ".$licznik_pytan);
    $data[] = $numerPytania;

    $pytanie = Html::createH2($question['question']);
    $opcje = [];
    $licznik = 1;
    foreach ($question['answers'] as $answer){
        $opcje[] = $licznik.". ".Html::createLabel($answer->id,$answer->answer).Html::createInput($key."_".$answer->id,$key,'radio',$answer->id)."<br>";
        $licznik++;
    }
    $data[] = Html::createArticle([$pytanie,Html::createContainer("zadanie_".$key,$opcje)]);

    $zadanie[] = Html::createSection($data);
}

$zadanie[] = Html::createInput('all','all','hidden',count($questions));
$form = Html::createForm($zadanie,"POST",'app/checkQuizResult.php','Wyślij');

$lastLine = Html::createSection([Html::createHr()]);

$html = Html::createContainer("quiz",[$form,$lastLine]);

return $html;