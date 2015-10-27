<!-- ◯×問題のトップページ -->
<?php
//◯×問題の回答スタートボタン
//過去問取得ページへのリダイレクト
echo $this->Form->create('answer', array('url' => 'top_true_false'));
echo $this->Form->hidden('button_flag', array('value' => 1));
echo $this->Form->end('start');
?>

<h4>問題の回答には制限時間があります</h4>
<h4>制限時間内に回答できなかった場合、その問題は不正解となり、次の問題が表示されます</h4>
<h4>※問題の制限時間は問題文の長さにより異なります</h4>