<?php
	echo "user_id=12";//仮のユーザーとして表示
	echo "さんが作問した問題一覧".$this->Html->tag('br');
	echo "●未投稿　●評価待ち　●調整中　●公開済み".$this->Html->tag('br').$this->Html->tag('br');
	echo "未投稿問題".$this->Html->tag('br');
	foreach ($show_data as $key => $show_data):
	echo "[".$key."]： ".$this->Html->link($show_data['Problem']['sentence'],
		array('controller' => 'problems', 'action' => 'view_problem',$show_data['Problem']['id'],$show_data['Problem']['type']));
	echo $this->Html->tag('br');
	endforeach;
	echo $this->Html->tag('br');
	echo $this->Html->tag('br');
	echo $this->Html->link("トップページに戻る",
		array('controller' => 'problems', 'action' => 'top'));
?>