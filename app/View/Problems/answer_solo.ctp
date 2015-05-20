<h1>answer_solo</h1>
<?php
echo $this->Form->create('Problem', array('type' => 'post', 'action' => 'result'));
$problemList = array();
foreach($problems as $key => $problem){
    $radioOptions = array(
        $choices[$key][0] => $choices[$key][0],
        $choices[$key][1] => $choices[$key][1],
        $choices[$key][2] => $choices[$key][2],
        $choices[$key][3] => $choices[$key][3]
    );
    $radioAttributes = array('legend' => false);
    echo $this->Html->para(null, $problem['sentence']);
    echo $this->Form->radio($key, $radioOptions, $radioAttributes);
    echo '<br>';
}
echo $this->Form->end('結果発表');
