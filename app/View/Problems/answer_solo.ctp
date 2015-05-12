<h1>answer_solo</h1>
<?php
echo $this->Form->create('Problem', array('type' => 'post', 'action' => 'result'));
$problemList = array();
foreach($problems as $key => $problem){
    $radioOptions = array(
        1 => $problem['right_answer'],
        2 => $problem['wrong_answer1'],
        3 => $problem['wrong_answer2'],
        4 => $problem['wrong_answer3']
    );
    $radioAttributes = array('legend' => false);
    echo $this->Html->para(null, $problem['sentence']);
    echo $this->Form->radio($key, $radioOptions, $radioAttributes);
    echo '<br>';
}
echo $this->Form->end('結果発表');
