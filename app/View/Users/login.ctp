<?php
echo $this->Form->create('User', array('url' => 'login'));

echo '<p>管理者名 : ';
echo $this->Form->input('username', array('size'=>30, 'label'=>false, 'error'=>false, 'div'=>false));
echo '</p>';

echo '<p>パスワード : ';
echo $this->Form->input('password', array('size'=>30, 'label'=>false, 'error'=>false, 'div'=>false));
echo '</p>';

// ボタン
echo $this->Form->end(__('ログイン'));
