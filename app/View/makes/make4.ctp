<?php //echo $this->form($type,$form,$ctInfo,$sbctInfo,$users,null);?>

<div id ="view">
	<?php
	echo $this->Form->create('csv', array( 'type'=>'> text', 'enctype' => 'multipart/form-data', 'url'=>'/makes/makecheck'));
	?>
	<input type="hidden" name="kentei_id" value="1"></input>
	<!-- この部分は変える必要あり。 -->
	<input type="hidden" name="user_id" value="12"></input>
	<!-- 特にuser_idはその人によって変更しなければいけない。 -->
	<input type="hidden" name="grade" value="0"></input>
	<!-- 変更余地あり。 -->
	<input type="hidden" name="number" value="0"></input>
	<!-- 変更余地あり -->
	<input type="hidden" name="public_flag" value="0"></input>
	<!-- オリジナル問題の為初期値を０に設定 -->
	<input type="hidden" name="type" value="<?php echo $type;?>"></input>
	<!-- type送信 -->
	<input type="hidden" name="category_id" value="1"></input>
	<!-- カテゴリid送信 -->
	<input type="hidden" name="item" value="1"></input>
	<!-- item送信 -->
	[選択式問題作成] *は必須項目です
	<a href="make1">記述式問題作成に切替</a>
	</BR>
	カテゴリ*
	<select name="category" required="requied">
		<option value=""></option>
		<option value="選択肢2">選択肢2</option>
		<option value="選択肢3">選択肢3</option>
	</select>
	[この投稿で
	◯
	ポイント獲得] / サブカテゴリ
	<select  name="subcategory" required="requied">
		<option value=""></option>
		<option value="選択肢2">選択肢2</option>
		<option value="選択肢3">選択肢3</option>
	</select>
	</BR>
	(カテゴリがわからないときは「その他」を選択してください)
	</BR>
	問題文* [ 最大70 文字 ]
	</BR>
	<textarea name = "sentence" cols="90" rows="2"></textarea>
	</BR>
選択肢の設定*
	</BR>
	</BR>
	<p>
正解選択肢１<textarea  name = "right_answer"rows="2" cols="90"></textarea>
	</p>
	<p>
誤答選択肢１<textarea  name = "wrong_answer1"rows="2" cols="90"></textarea>
	</p>
	<p>
誤答選択肢２<textarea  name = "wrong_answer2"rows="2" cols="90"></textarea>
	</p>
	<p>
誤答選択肢３<textarea  name = "wrong_answer3"rows="2" cols="90"></textarea>
	</p>

<!--正解番号がいらないのでは？
正解番号*
<select name="right_answer" required="required">
    <option value=""></option>
    <option value="1">
        1
    </option>
    <option value="2">
        2
    </option>
    <option value="3">
        3
    </option>
    <option value="4">
        4
    </option>
</select>
-->
</BR>
    写真を載せる場合は以下から登録 (200kb以下、JPEG および PNG画像)
<input type="file" name="image"></input>
    タグ(複数タグは半角「/」で区切り 例:盛岡/岩手/川)
<input type="text" name="tag"></input>
<!--
	今のところ使わない機能
問題の有効期限を設定する
<input type="checkbox" name="limit"></input>
<select name="data[Problem][limitTime][year]">
    <option value=""></option>
</select>
-
<select name="data[Problem][limitTime][month]"></select>
-
<select name="data[Problem][limitTime][day]"></select>
-->
</BR>
解説* (メモ、参考URL、文献等)
<textarea required="required" cols="80" rows="4" name="description"></textarea>
<?php
    echo $this->Form->submit( ('この内容で送信する'));
    echo $this->Form->end();
    echo "<br />";
?>
<a id="back" href="top">戻る</a>
</div>
