<h1>select_the_past</h1>
<?php
foreach($categoryProperties as $id => $name){
    $url = 'answer'.DS.'2012'.DS.'1'.DS .$id.DS.'3'.DS.'5';
    $nameLinks[] = $this->Html->link($name, $url);
}
echo $this->Html->nestedList($nameLinks);
echo $this->Html->link('オリジナル問題', array('controller' => 'problems', 'action' => 'selectTheOriginal'));

