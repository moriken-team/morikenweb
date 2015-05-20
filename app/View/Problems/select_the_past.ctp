<h1>select_the_past</h1>
<?php
foreach($categories as $id => $category){
    $url = 'answer'.DS.'2012'.DS.'1'.DS .$id.DS.'3'.DS.'5';
    $links[] = $this->Html->link($category, $url);
}
echo $this->Html->nestedList($links);
echo $this->Html->link('オリジナル問題', array('controller' => 'problems', 'action' => 'selectAnswerType/original'));

