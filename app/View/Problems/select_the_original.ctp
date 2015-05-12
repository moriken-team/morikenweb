<h1>select_the_original</h1>
<?php
foreach($categoryProperties as $key => $properties){
    $url = 'answer'.DS.'0'.DS.'1'.DS .$key.DS.'3'.DS.'5';
    $linkNames[] = $this->Html->link($properties, $url);
}
echo $this->Html->nestedList($linkNames);
echo $this->Html->link('過去問題', array('controller' => 'problems', 'action' => 'selectThePast'));
