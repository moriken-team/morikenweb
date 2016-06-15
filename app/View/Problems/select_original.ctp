<h1>select_the_original</h1>
<?php
foreach($categories as $id => $category){
    $url = 'answer'.DS.'0'.DS.'1'.DS .$id.DS.'3'.DS.'5';
    $links[] = $this->Html->link($category, $url);
}
echo $this->Html->nestedList($links);
echo $this->Html->link('過去問題', array('controller' => 'problems', 'action' => 'selectAnswerType'));
