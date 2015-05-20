<?php
App::uses('AppModel','Model');
class Problem extends AppModel {
    public $name = 'Problem';

    public function extractColumns($problems, $columnNames) {
        $columns = array();
        foreach($problems as $key => $problem){
            foreach($columnNames as $name){
                $columns[$key][$name] = $problem['Problem'][$name];
            }
        }
        return $columns;
    }

    public function validateCorrect($postAnswer, $correct) {
        if($postAnswer === $correct){
            return true;
        }
        return false;
    }

    public function countCorrect($postAnswers, $correctAnswers) {
        $correct = 0;
        foreach($correctAnswers as $key => $correctAnswer){
            if($this->validateCorrect($postAnswers[$key], $correctAnswer['Problem']['right_answer'])){
                $correct++;
            }
        }
        return $correct;
    }
}
