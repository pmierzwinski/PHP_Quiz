<?php

require_once("API/Api.php");
require_once("Helpers/Html.php");
require_once("Helpers/Provider.php");

$html = '';

///LEWA STRONA

$dodaj=[];

$dodaj[] = Html::createLabel('que',"Nowe pytnie  ");
$dodaj[] = Html::createInput("question",'question','text','',"margin-left:10%")."<br>"."<br>";

$dodaj[] = Html::createLabel('ans1',"Nowa odpowiedz  ");
$dodaj[] = Html::createInput('answer1','answer1','text','',"margin-left:5%");
$dodaj[] = Html::createInput("answer1value",'answer','radio','1')."<br>";

$dodaj[] = Html::createLabel('ans',"Nowa odpowiedz  ");
$dodaj[] = Html::createInput('answer2','answer2','text','',"margin-left:5%");
$dodaj[] = Html::createInput("answer2value",'answer','radio','2')."<br>";

$dodaj[] = Html::createLabel('ans3',"Nowa odpowiedz  ");
$dodaj[] = Html::createInput('answer3','answer3','text','',"margin-left:5%");
$dodaj[] = Html::createInput("answer3value",'answer','radio','3')."<br>";

$dodaj[] = Html::createLabel('ans4',"Nowa odpowiedz  ");
$dodaj[] = Html::createInput('answer4','answer4','text','',"margin-left:5%");
$dodaj[] = Html::createInput("answer4value",'answer','radio','4')."<br>";

$newQuestionForm = Html::createForm($dodaj,'POST','app/addQuestion.php','Dodaj pytanie');

$zadanie = [$newQuestionForm];

$questions = Provider::getQuestionsWithAnswers();
$licznik_pytan = 0;
foreach ($questions as $key => $question)
{
    $licznik_pytan++;
    $data = [];

    $data[] = Html::createHr();

    $numerPytania = Html::createH1("Pytanie ".$licznik_pytan);
    $data[] = $numerPytania;

    $pytanie = Html::createH2($question['question']);

    $opcje = [];
    $licznik = 1;
    $poprawna = '';
    foreach ($question['answers'] as $answer)
    {
        if($answer->correct == 1){$poprawna = 'POPRAWNA ODPOWIEDZ!';}
        $opcje[] = $licznik.". ".Html::createLabel($answer->id,$answer->answer)."  ".$poprawna."<br>";
        $poprawna = '';
        $licznik++;
    }
    $data[] = Html::createArticle([$pytanie,Html::createContainer("zadanie_".$key,$opcje)]);

    $deleteId = Html::createInput('questionId','questionId',"hidden",$key);
    $data[] = $deleteForm = Html::createForm([$deleteId],"POST",'app/deleteQuestion.php',"Usuń");

    $zadanie[] = Html::createSection($data);
}
$zadanie[] = Html::createSection([Html::createHr()]);

$html .= Html::createContainer("leftSide",$zadanie,'width:45%;float:left;');



///PRAWA STRONA


$dodaj=[];

$dodaj[] = Html::createLabel('log',"Nowy login  ");
$dodaj[] = Html::createInput('login','login','text','',"margin-left:4.5%")."<br>";

$dodaj[] = Html::createLabel('pass',"Nowe hasło  ");
$dodaj[] = Html::createInput('password','password','text','',"margin-left:4%")."<br>";

$newQuestionForm = Html::createForm($dodaj,'POST','app/addUser.php',"Dodaj")."<br>";
$html .= Html::createContainer('RnewQuestionR',[$newQuestionForm],'width:45%;float:right;');

$zadanie = [];

$opisTextArea = Html::createLabel('multiIndex',"Nowe loginy oddzielone znamkiem nowej linii  ");

$indexes = Html::createCustomHtml('textarea','users','','height:30%;width:25%','form="indexForm" name="indexes"')."<br>";
$newIndexesForm = Html::createForm([$indexes],'POST','app/generateUsers.php','Dodaj',"indexForm")."<br>";

$html .= Html::createContainer('NewIndexQuestions',[$opisTextArea,$newIndexesForm],'width:45%;float:right;');

$table = Html::createTable('UsersTabel',Provider::getUsersInArray('app/deleteUser.php'));
$zadanie []= $table;

$html .= Html::createContainer("RightSide",$zadanie,'width:45%;float:right;');

return $html;
