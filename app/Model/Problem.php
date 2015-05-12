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
}
