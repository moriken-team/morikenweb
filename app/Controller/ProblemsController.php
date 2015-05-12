<?php
App::uses('AppController','Controller');
//API利用時、もりけんwebからのアクセスはkentei_id=1で管理する
define('MORIKEN_WEB_ID',1);
class ProblemsController extends AppController {
    public $name = 'Problems';
    public $uses = array('Category');
    public $components = array('Session');

    public function selectStage() {
        //回答ステージ選択画面
    }

    public function selectThePast() {
        //過去問回答カテゴリ&級選択画面
        //※ 選択したステージレベル情報はセッションで保持すること
        $this->Session->write('stageLevel', 'first');
        $querys = 'kentei_id='.MORIKEN_WEB_ID;
        $response = $this->api_rest('GET', 'categories/index.json', $querys, array());
        $categoryNames = $this->Category->createProperties($response, "name");
        $categoryIds = $this->Category->createProperties($response, "id");
        $this->set('categoryProperties', array_combine($categoryIds, $categoryNames));
    }

    public function selectTheOriginal() {
        //過去問回答カテゴリ選択画面
        $querys = 'kentei_id='.MORIKEN_WEB_ID;
        $response = $this->api_rest('GET', 'categories/index.json', $querys, array());
        $categoryNames = $this->Category->createProperties($response, "name");
        $categoryIds = $this->Category->createProperties($response, "id");
        $this->set('categoryProperties', array_combine($categoryIds, $categoryNames));
    }

    public function selectTheEmployGrade($stageLevel) {
        //試験モード回答対象問題選択画面
        $this->Session->write('stageLevel', $stageLevel);
    }

    public function answer($employ, $publicFlag, $categoryId, $grade, $item) {
        //回答画面
    }

    public function result() {
        //回答結果画面
    }
}
