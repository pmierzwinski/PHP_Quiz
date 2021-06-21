<?php

class Provider
{

    public static function getQuestionsWithAnswers()
    {
        $data = Api::call(GetQuestions::class);
        $result = json_decode($data);
        $questions = [];
        foreach ($result as $question)
        {
            $questions[$question->id] = [];
            $data = Api::call(GetAnswers::class,['question' => $question->id]);
            $answers = json_decode($data);
            $questions[$question->id]  = [
                'question' => $question->question,
                'answers' => $answers
            ];
        }

        return $questions;
    }

    public static function getCorrectAnswers()
    {
        $data = Api::call(GetAnswers::class);
        $result = json_decode($data);
        $answers = [];
        foreach ($result as $answer)
        {
            if($answer->correct)
            {
                $answers[] = $answer->id;
            }
        }
        return $answers;
    }

    public static function getUsersInArray($deleteButtonEndpoint = '')
    {
        $data = Api::call(GetUsers::class);
        $result = json_decode($data);

        $array = [["","Login","Haslo","Wynik",""]];
        foreach ($result as $user)
        {
            if($user->login =='admin')
            {
                continue;
            }

            error_reporting(0);
            $points = json_decode(Api::call('GetResults',['user' => $user->login]))[0]->result;

            $newRow = ['id' => $user->id,'login' => $user->login,'password' => $user->password,'points' => $points];

            if (!empty($deleteButtonEndpoint))
            {
                $newRow['delete'] =
                    '<form method = POST action='.$deleteButtonEndpoint.'>
                    <input type="hidden" id="'.$user->id.'" name="userId" value="'.$user->id.'">
                    <input type="submit" value="Usuń">
                    </form>';
            }

            $array[] = $newRow;
        }
        return $array;
    }

    public static function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}