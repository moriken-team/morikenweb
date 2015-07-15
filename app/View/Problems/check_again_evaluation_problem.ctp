<div class="function_left">
  <!-- サブナビ部分 -->
  <ul>
    <li><a href="#">模擬テスト</a></li>
    <li><a href="#">テスト1</a></li>
    <li><a href="#">テスト2</a></li>
    <li><a href="#">テスト3</a></li>
  </ul>
</div>
<div class="function_right">
<h2>※修正点がある場合は評価コメントをしてください</h2>
<!-- 以下評価項目の内容については後に検討 -->
<?php
	echo $this->Form->create('Problems',array(
		'type' => 'post',
		'action' => 'precheck_evaluation_problem',
		// 'action' => 'index'
	));
	// 評価項目とチェック・コメントフォームのリスト
	foreach ($check_again_data['error_list'] as $EvaluateItem_id => $EvaluateItem_value) {
		// 評価項目に対してチェック
		echo $this->Form->input("$EvaluateItem_id.check",array(
				'type'	=> 'checkbox',
				'label'	=> $EvaluateItem_value,
				'div'	=> false,
        'checked' => true
				));
		// 評価項目に対してコメント
		echo $this->Form->input("$EvaluateItem_id.comment",array(
				'type'	=> 'textarea',
				'label'	=> false
				));
		// 評価項目
		echo $this->Form->input("$EvaluateItem_id.name",array(
				'type'	=> 'hidden',
				'value'	=> $EvaluateItem_value
				));
		echo $this->html->tag('hr');
		echo $this->html->tag('br');
	}
	echo $this->Form->input("Problem_info.id",array(
		'type'	=> 'hidden',
		'value'	=> $check_again_data['Problem_id']
		));
	echo $this->Form->submit('評価する');
?>
</div>
