<?php
App::uses('AppModel','Model');
class Problem extends AppModel {
    public $name = 'Problem';

    public function createPropertyList($problems, $propertyNames) {
        $propertyList = array();
        //リファクタリング必要？
        foreach($problems as $key => $problem){
            foreach($propertyNames as $name){
                $propertyList[$key][$name] = $problem['Problem'][$name];
            }
        }
        return $propertyList;
    }

    public function validateResultOfReply($postAnswer, $correct) {
        if($postAnswer === $correct){
            return true;
        }
        return false;
    }

    public function countCorrect($postAnswers, $correctAnswers) {
        $numberOfCorrect = 0;
        foreach($correctAnswers as $key => $correctAnswer){
            if($this->validateResultOfReply($postAnswers[$key], $correctAnswer['Problem']['right_answer'])){
                $numberOfCorrect++;
            }
        }
        return $numberOfCorrect;
    }
}
