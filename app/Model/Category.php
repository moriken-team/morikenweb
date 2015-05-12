<?php
App::uses('AppModel','Model');
class Category extends AppModel {
    public $name = 'Category';

    public function createProperties($response, $propertyName) {
        foreach($response["response"]["Categories"] as $category){
            $properties[] = $category["Category"][$propertyName];
        }
        return $properties;
    }
}
