<?php
App::uses('AppModel', 'Model');
class User extends AppModel{
  public $useTable = false;
  public $validate = array(
    'username' => array(
      array(
        'rule' => 'isUnique', //重複禁止
        'message' => '既に使用されている名前です。'
      ),
      array(
        'rule' => 'alphaNumeric', //半角英数字のみ
        'message' => '名前は半角英数字にしてください。'
      ),
      array(
        'rule' => array('between', 2, 32), //2～32文字
        'message' => '名前は2文字以上32文字以内にしてください。'
      )
    ),
    'email' => array(
      array(
        'rule' =>'alphaNumeric',
        'message' => 'Eメールアドレスは半角英数字にしてください。'
      )
    ),
    'password' => array(
      array(
        'rule' => 'alphaNumeric',
        'message' => 'パスワードは半角英数字にしてください。'
      ),
      array(
        'rule' => array('between', 6, 32),
        'message' => 'パスワードは6文字以上32文字以内にしてください。'
      )
    ),
  );
  public function validation($url){
    //debug($url);
    if(!empty($url['error'])){
      if($url['error']['validation']['User']['email']=='email')
        $message = "メールアドレスを正しく入力してください。";
        return $message;
    }
    return NULL;//成功なら1を返す
  }
}
