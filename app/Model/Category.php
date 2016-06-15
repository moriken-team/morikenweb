<?php
App::uses('AppModel','Model');
class Category extends AppModel {
    public $name = 'Category';

    public function extractColumns($categories, $columnNames) {
        $columns = array();
        foreach($categories as $key => $category){
            foreach($columnNames as $name){
                $columns[$name][] = $category["Category"][$name];
            }
        }
        return $columns;
    }
}
