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
<h2>非公開問題</h2>
<table>
	<?php $i = 1; ?>
	<?php foreach ($show_obj['priv']['response']['Problems'] as $key => $value): ?>
	<tr>
		<td><?php echo "[".$i."] "; ?></td>
		<td><?php echo $this->Html->link($value['Problem']['sentence'],array('action' => 'check_evaluation_problem',$value['Problem']['id'])); ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>
<?php //pr($show_obj) ?>
